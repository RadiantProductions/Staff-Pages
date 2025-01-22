<?php
include_once 'config/db.php';

function add_user($username, $password, $role, $email) {
    global $conn;

    if (empty($username) || empty($password) || empty($role) || empty($email)) {
        return false;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, status) VALUES (?, ?, ?, ?, 'Active')");
    $stmt->bind_param("ssss", $username, $hashed_password, $email, $role);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function update_user_role($user_id, $role) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->bind_param("si", $role, $user_id);
    return $stmt->execute();
}

function delete_user($user_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    return $stmt->execute();
}

function update_user_password($user_id, $new_password) {
    global $conn;
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $user_id);
    return $stmt->execute();
}

function update_user_email($user_id, $new_email) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->bind_param("si", $new_email, $user_id);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'add_user') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $email = $_POST['email'];

        if (add_user($username, $password, $role, $email)) {
            echo "<script>new PNotify({text: 'User added successfully!', type: 'success'});</script>";
        } else {
            echo "<script>new PNotify({text: 'Failed to add user.', type: 'error'});</script>";
        }
        exit;
    }

    if ($action == 'update_user') {
        $user_id = $_POST['user_id'];
        $updated_role = $_POST['updated_role'];
        if (update_user_role($user_id, $updated_role)) {
            echo "<script>new PNotify({text: 'User role updated successfully!', type: 'success'});</script>";
        } else {
            echo "<script>new PNotify({text: 'Failed to update user role.', type: 'error'});</script>";
        }
        exit;
    }

    if ($action == 'delete_user') {
        $user_id = $_POST['user_id'];
        if (delete_user($user_id)) {
            echo "<script>new PNotify({text: 'User deleted successfully!', type: 'success'});</script>";
        } else {
            echo "<script>new PNotify({text: 'Failed to delete user.', type: 'error'});</script>";
        }
        exit;
    }

    if ($action == 'update_password') {
        $user_id = $_POST['user_id'];
        $new_password = $_POST['new_password'];
        if (update_user_password($user_id, $new_password)) {
            echo "<script>new PNotify({text: 'Password updated successfully!', type: 'success'});</script>";
        } else {
            echo "<script>new PNotify({text: 'Failed to update password.', type: 'error'});</script>";
        }
        exit;
    }

    if ($action == 'update_email') {
        $user_id = $_POST['user_id'];
        $new_email = $_POST['new_email'];
        if (update_user_email($user_id, $new_email)) {
            echo "<script>new PNotify({text: 'Email updated successfully!', type: 'success'});</script>";
        } else {
            echo "<script>new PNotify({text: 'Failed to update email.', type: 'error'});</script>";
        }
        exit;
    }
}
?>
