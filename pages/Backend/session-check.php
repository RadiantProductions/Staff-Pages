<?php
session_start();
include_once 'config/db.php';

// Check if the user is logged in and has the "owner" role
function check_user_access() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    global $conn;
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $role = strtolower($user['role']);

    if ($role !== 'owner') {
        echo "<script>new PNotify({text: 'You do not have permission to access this page.', type: 'error'});</script>";
        header("refresh:3; url=https://staff.radiantradios.xyz/pages/dashboard.php");
        exit;
    }
}
?>
