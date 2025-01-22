<?php
$ini = parse_ini_file('/home/u967747021/env/radiantprod.ini');
$secret_key = hex2bin($ini['secret_key']);
$secret_iv = hex2bin($ini['secret_iv']);
include_once 'config/db.php';

function encrypt_data($data) {
    global $secret_key, $secret_iv;
    $method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
    return base64_encode($encrypted);
}

function decrypt_data($data) {
    global $secret_key, $secret_iv;
    $method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $decrypted = openssl_decrypt(base64_decode($data), $method, $key, 0, $iv);
    return $decrypted;
}

function add_user($username, $password, $role, $email) {
    global $conn;
    if (empty($username) || empty($password) || empty($role) || empty($email)) {
        return ['status' => 'error', 'message' => 'All fields are required.'];
    }
    $encrypted_password = encrypt_data($password);
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, status) VALUES (?, ?, ?, ?, 'Active')");
    $stmt->bind_param("ssss", $username, $encrypted_password, $email, $role);
    if ($stmt->execute()) {
        return ['status' => 'success', 'message' => 'User added successfully.'];
    } else {
        return ['status' => 'error', 'message' => 'Failed to add user.'];
    }
}

function update_user_role($user_id, $role) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->bind_param("si", $role, $user_id);
    if ($stmt->execute()) {
        return ['status' => 'success', 'message' => 'User role updated successfully.'];
    } else {
        return ['status' => 'error', 'message' => 'Failed to update user role.'];
    }
}

function delete_user($user_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        return ['status' => 'success', 'message' => 'User deleted successfully.'];
    } else {
        return ['status' => 'error', 'message' => 'Failed to delete user.'];
    }
}

function update_user_status($user_id, $status) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $user_id);
    if ($stmt->execute()) {
        return ['status' => 'success', 'message' => 'User status updated successfully.'];
    } else {
        return ['status' => 'error', 'message' => 'Failed to update user status.'];
    }
}
?>
