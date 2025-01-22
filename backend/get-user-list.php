<?php
include_once 'config/db.php';
include_once 'encryption.php';

function get_user_list() {
    global $conn;
    $roles = ['owner', 'developer', 'manager', 'presenter'];
    $users_sql = "SELECT * FROM users";
    $users_result = $conn->query($users_sql);

    while ($row = $users_result->fetch_assoc()) {
        $raw_password = decrypt_password($row['password'], $secret_key, $secret_iv);
        echo "<tr id='user-{$row['id']}'>";
        echo "<td>{$row['username']}</td>";
        echo "<td><select class='update-role' data-user-id='{$row['id']}'>";
        foreach ($roles as $role_option) {
            $selected = strtolower($row['role']) === $role_option ? 'selected' : '';
            echo "<option value='{$role_option}' {$selected}>".ucfirst($role_option)."</option>";
        }
        echo "</select></td>";
        echo "<td>{$row['email']}</td>";
        echo "<td><button class='delete-user' data-user-id='{$row['id']}'>Delete</button></td>";
        echo "<td><button class='update-password' data-user-id='{$row['id']}'>Update Password</button></td>";
        echo "</tr>";
    }
}
?>
