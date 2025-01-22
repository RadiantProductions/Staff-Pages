<?php
include_once '../backend/config/db.php';
include_once '../backend/user-management.php';

session_start();

// Check if the user is logged in and has the "Owner" role via cookies
if (!isset($_COOKIE['user_id']) || !isset($_COOKIE['user_role']) || $_COOKIE['user_role'] !== 'Owner') {
    header("Location: OLDdashboard.php");
    exit();
}

function get_users() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return [];
    }
}

function get_roles() {
    global $conn;
    $sql = "SELECT DISTINCT role FROM users";
    $result = $conn->query($sql);
    
    $roles = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row['role'];
        }
    }
    return $roles;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $response = ['status' => 'error', 'message' => 'Unknown action'];

    switch($action) {
        case 'add_user':
            $result = add_user($_POST['username'], $_POST['password'], $_POST['role'], $_POST['email']);
            if ($result) {
                $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? ORDER BY id DESC LIMIT 1");
                $stmt->bind_param("s", $_POST['username']);
                $stmt->execute();
                $new_user = $stmt->get_result()->fetch_assoc();
                
                $response = [
                    'status' => 'success',
                    'message' => 'User added successfully!',
                    'new_user' => $new_user
                ];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to add user.'];
            }
            break;

        case 'update_status':
            $result = update_user_status($_POST['user_id'], $_POST['new_status']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'Status updated successfully!' : 'Failed to update status.',
                'user_id' => $_POST['user_id'],
                'new_status' => $_POST['new_status']
            ];
            break;

        case 'update_role':
            $result = update_user_role($_POST['user_id'], $_POST['updated_role']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'Role updated successfully!' : 'Failed to update role.'
            ];
            break;

        case 'delete_user':
            $result = delete_user($_POST['user_id']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'User deleted successfully!' : 'Failed to delete user.'
            ];
            break;

        case 'update_password':
            $result = update_user_password($_POST['user_id'], $_POST['new_password']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'Password updated successfully!' : 'Failed to update password.'
            ];
            break;

        case 'update_email':
            $result = update_user_email($_POST['user_id'], $_POST['new_email']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'Email updated successfully!' : 'Failed to update email.'
            ];
            break;

        case 'update_username':
            $result = update_user_username($_POST['user_id'], $_POST['new_username']);
            $response = [
                'status' => $result ? 'success' : 'error',
                'message' => $result ? 'Username updated successfully!' : 'Failed to update username.'
            ];
            break;
    }

    echo json_encode($response);
    exit;
}

$users = get_users();
$roles = get_roles();

?>

<?php include '../template/menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="_next/css/admin_page.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/pnotify@5.2.0/dist/PNotify.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pnotify@5.2.0/dist/PNotify.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Admin Panel</h1>

    <form id="addUserForm" method="POST" action="">
        <input type="hidden" name="action" value="add_user">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <label for="role">Role:</label>
        <select name="role" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <button type="submit">Add User</button>
    </form>

    <table id="usersTable" border="1" style="width: 100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr id="user-<?php echo $user['id']; ?>">
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td class="status-<?php echo $user['id']; ?>"><?php echo $user['status']; ?></td>
                    <td>
                        <form class="updateStatusForm" method="POST" action="">
                            <input type="hidden" name="action" value="update_status">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <select name="new_status">
                                <option value="Active" <?php echo $user['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                                <option value="Inactive" <?php echo $user['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                <option value="Suspended" <?php echo $user['status'] == 'Suspended' ? 'selected' : ''; ?>>Suspended</option>
                            </select>
                            <button type="submit">Update Status</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        function showNotification(message, type) {
            PNotify.alert({
                text: message,
                type: type,
                delay: 3000
            });
        }

        function refreshTable() {
            $.get(window.location.href, function(response) {
                var newDoc = new DOMParser().parseFromString(response, 'text/html');
                $('#usersTable tbody').html($(newDoc).find('#usersTable tbody').html());
            });
        }

        $('form').on('submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = $form.serialize();

            $.ajax({
                url: '',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    showNotification(response.message, response.status);

                    if (response.status === 'success') {
                        if ($form.attr('id') === 'addUserForm') {
                            $form[0].reset();
                        }
                        refreshTable();
                    }
                },
                error: function() {
                    showNotification('An error occurred', 'error');
                }
            });
        });
    });
    </script>
    
      <!-- Include footer.php here -->
    <?php include '../template/footer.php'; ?>
</body>
</html>
