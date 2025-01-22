<?php
session_start();

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../backend/config/db.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Please fill in both username and password.";
    } else {
        function loadSecretsFromIni($iniFile) {
            if (file_exists($iniFile)) {
                $secrets = parse_ini_file($iniFile);
                return [
                    'secret_key' => $secrets['secret_key'],
                    'secret_iv'  => $secrets['secret_iv']
                ];
            } else {
                throw new Exception("INI file not found: $iniFile");
            }
        }

        $iniFile = '/home/u967747021/env/radiantprod.ini';

        try {
            $secrets = loadSecretsFromIni($iniFile);
            $secret_key = hex2bin($secrets['secret_key']);
            $secret_iv = hex2bin($secrets['secret_iv']);

            $sql = "SELECT id, password, role FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                error_log("SQL Error: " . $conn->error);
                die("Database query error. Please try again later.");
            }

            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                $encrypted_password = base64_decode($user['password']);
                $decrypted_password = openssl_decrypt($encrypted_password, 'AES-256-CBC', $secret_key, 0, $secret_iv);

                if ($decrypted_password === $password) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_role'] = $user['role'];

                    // Set cookies for persistent access (optional, with a 30-day expiration)
                    setcookie('user_id', $user['id'], time() + (30 * 24 * 60 * 60), "/"); // 30 days
                    setcookie('user_role', $user['role'], time() + (30 * 24 * 60 * 60), "/"); // 30 days

                    session_write_close();
                    header("Location: OLDdashboard.php");
                    exit;
                } else {
                    $error = "Invalid password.";
                    error_log("Failed login attempt: Invalid password for user: $username");
                }
            } else {
                $error = "User not found.";
                error_log("Failed login attempt: User not found for username: $username");
            }

            $stmt->close();
        } catch (Exception $e) {
            $error = "An error occurred while loading the secret key and IV: " . $e->getMessage();
            error_log($error);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radiant Productions Staff - Login</title>
    <link rel="icon" href="favicon.png" type="images/png">
    <meta name="description" content="Login to Radiant Productions' Management System. Manage your staff account seamlessly with our secure platform.">
    <meta name="keywords" content="Radiant Productions, Staff Login, Management System, Secure Login, Radiant Radios">
    <meta name="author" content="Radiant Productions">
    <meta property="og:title" content="Radiant Productions Staff - Login">
    <meta property="og:description" content="Access the Radiant Productions Management System to manage your staff account.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.radiantproductions.com/login">
    <meta property="og:image" content="https://www.radiantproductions.com/assets/login-preview.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Radiant Productions Staff - Login">
    <meta name="twitter:description" content="Login to Radiant Productions' Management System securely and efficiently.">
    <meta name="twitter:image" content="https://www.radiantproductions.com/assets/login-preview.png">
    <link rel="stylesheet" href="logintest1.css?v=<?php echo time(); ?>">
</head>
<body>
   <div class="left-section">
    <h1>Radiant Radios</h1>
    <p>Management System</p>
</div>
    <div class="right-section">
        <div class="login-box">
             <a href="https://www.radiantradios.xyz" class="return-button">Back to Home</a>
            <h2>Hey, welcome back!</h2>
            <?php if (isset($error)): ?>
                <div class="error-message">
                    <p><?php echo htmlspecialchars($error); ?></p>
                </div>
            <?php endif; ?>
            <form method="POST">
                <label for="username">Username/Email</label>
                <input type="text" id="username" name="username" placeholder="Enter your username/email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
      
</body>
</html>
