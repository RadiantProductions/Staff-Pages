<?php
session_start();
include_once '../backend/config/db.php';

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

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$iniFile = '/home/u967747021/env/radiantprod.ini';
$secrets = loadSecretsFromIni($iniFile);
$secret_key = $secrets['secret_key'];
$secret_iv = $secrets['secret_iv'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && openssl_decrypt(hex2bin($user['password']), 'AES-256-CBC', hex2bin($secret_key), 0, hex2bin($secret_iv)) === $current_password) {
            if ($new_password === $confirm_password) {
                $encrypted_password = openssl_encrypt($new_password, 'AES-256-CBC', hex2bin($secret_key), 0, hex2bin($secret_iv));
                $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("si", base64_encode($encrypted_password), $user_id);

                if ($update_stmt->execute()) {
                    $success_message = "Password updated successfully!";
                } else {
                    $error_message = "Failed to update password. Please try again.";
                }
            } else {
                $error_message = "New password and confirmation do not match.";
            }
        } else {
            $error_message = "Current password is incorrect.";
        }
    }

    if (isset($_POST['update_email'])) {
        $new_email = $_POST['new_email'];

        if (filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $update_sql = "UPDATE users SET email = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $new_email, $user_id);

            if ($update_stmt->execute()) {
                $success_message = "Email updated successfully!";
            } else {
                $error_message = "Failed to update email. Please try again.";
            }
        } else {
            $error_message = "Invalid email format.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="_next/css/account_settings.css?v=<?php echo time(); ?>">
</head>
<body>

    <?php include_once '../template/menu.php'; ?>

    <h2>Account Settings</h2>

    <?php if (isset($success_message)) { echo "<p style='color:green;'>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>

    <form method="POST" action="account.php">
        <h3>Change Password</h3>
        <label for="current_password">Current Password:</label><br>
        <input type="password" name="current_password" required><br>
        <label for="new_password">New Password:</label><br>
        <input type="password" name="new_password" required><br>
        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" name="confirm_password" required><br>
        <button type="submit" name="update_password">Change Password</button>
    </form>

    <form method="POST" action="account.php">
        <h3>Update Email</h3>
        <label for="new_email">New Email:</label><br>
        <input type="email" name="new_email" required><br>
        <button type="submit" name="update_email">Update Email</button>
    </form>
<?php



// 🐾       📷 

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="template/footer.css?v=<?php echo time(); ?>">

 
</body>
</html>
 <!-- Include footer.php here -->
    <?php include '../template/footer.php'; ?>
