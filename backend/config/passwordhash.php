<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/backend/config/db.php';

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

$log_file = 'password_hashing.log';

error_log("Password hashing process started at " . date("Y-m-d H:i:s") . "\n", 3, $log_file);

try {
    $iniFile = '/home/u967747021/env/radiantprod.ini';
    $secrets = loadSecretsFromIni($iniFile);
    $secret_key = $secrets['secret_key'];
    $secret_iv = $secrets['secret_iv'];

    $secret_key = hex2bin($secret_key);
    $secret_iv = hex2bin($secret_iv);

    $sql = "SELECT id, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['id'];
            $plain_password = $row['password'];

            $encrypted_password = openssl_encrypt($plain_password, 'AES-256-CBC', $secret_key, 0, $secret_iv);

            $stored_password = base64_encode($encrypted_password);

            $update_sql = "UPDATE users SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);

            if ($update_stmt) {
                $update_stmt->bind_param("si", $stored_password, $user_id);
                $update_stmt->execute();

                if ($update_stmt->affected_rows > 0) {
                    $log_message = "Password for user ID $user_id updated successfully.";
                    echo "$log_message<br>";
                    error_log($log_message . "\n", 3, $log_file);
                } else {
                    $log_message = "No changes made for user ID $user_id.";
                    echo "$log_message<br>";
                    error_log($log_message . "\n", 3, $log_file);
                }
            } else {
                $error_message = "Error preparing statement: " . $conn->error;
                echo "$error_message<br>";
                error_log($error_message . "\n", 3, $log_file);
            }
        }
    } else {
        $log_message = "No users found in the database.";
        echo "$log_message<br>";
        error_log($log_message . "\n", 3, $log_file);
    }
} catch (Exception $e) {
    $error_message = "Exception: " . $e->getMessage();
    error_log($error_message . "\n", 3, $log_file);
    echo "An error occurred while updating passwords.";
}

error_log("Password hashing process ended at " . date("Y-m-d H:i:s") . "\n", 3, $log_file);
?>
