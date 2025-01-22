<?php
session_start();
$page_identifier = "invoice_list";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once '../backend/config/db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_role = $stmt->get_result()->fetch_assoc()['role'];

if (!in_array(strtolower($user_role), ['owner', 'developer', 'manager'])) {
    echo "You do not have permission to access this page.";
    header("refresh:3;url=dashboard.php");
    exit;
}

$sql = "SELECT * FROM invoices";
$stmt = $conn->prepare($sql);
$stmt->execute();
$invoices = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$user_timezone = 'America/Detroit';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user_role != 'presenter') {
    if (isset($_POST['invoice_id'])) {
        $invoice_id = $_POST['invoice_id'];
        if (isset($_POST['delete_invoice'])) {
            $delete_sql = "DELETE FROM invoices WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $invoice_id);
            $delete_stmt->execute();
        } else {
            $status = $_POST['status'];
            $update_sql = "UPDATE invoices SET status = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $status, $invoice_id);
            $update_stmt->execute();
        }
    } elseif (isset($_POST['new_invoice'])) {
        $client_name = $_POST['client_name'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];
        $insert_sql = "INSERT INTO invoices (client_name, amount, status) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $client_name, $amount, $status);
        $insert_stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Panel</title>
    <link rel="stylesheet" type="text/css" href="_next/css/invoices.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include '../template/menu.php'; ?>

    <div class="container">
        <h2>Invoice List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Client Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date Issued</th>
                    <?php if ($user_role != 'presenter'): ?>
                    <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr id="invoice-<?php echo $invoice['id']; ?>">
                    <td><?php echo $invoice['id']; ?></td>
                    <td><?php echo $invoice['client_name']; ?></td>
                    <td><?php echo number_format($invoice['amount'], 2); ?></td>
                    <td>
                        <?php
                        $date_issued = new DateTime($invoice['date_issued'], new DateTimeZone('UTC'));
                        $date_issued->setTimezone(new DateTimeZone($user_timezone));
                        echo $date_issued->format('l, F j, Y g:i A');
                        ?>
                    </td>
                    <td>
                        <?php echo $invoice['status']; ?>
                    </td>
                    <?php if ($user_role != 'presenter'): ?>
                    <td>
                        <form method="POST" action="" class="status-form" data-invoice-id="<?php echo $invoice['id']; ?>" style="display:inline;">
                            <input type="hidden" name="invoice_id" value="<?php echo $invoice['id']; ?>">
                            <select name="status" class="status-select" data-invoice-id="<?php echo $invoice['id']; ?>">
                                <option value="paid" <?php if ($invoice['status'] == 'paid') echo 'selected'; ?>>Paid</option>
                                <option value="unpaid" <?php if ($invoice['status'] == 'unpaid') echo 'selected'; ?>>Unpaid</option>
                                <option value="pending" <?php if ($invoice['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="incomplete" <?php if ($invoice['status'] == 'incomplete') echo 'selected'; ?>>Incomplete</option>
                            </select>
                            <button type="button" class="confirm-status-btn">Confirm</button>
                        </form>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="invoice_id" value="<?php echo $invoice['id']; ?>">
                            <input type="hidden" name="delete_invoice" value="1">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($user_role != 'presenter'): ?>
        <h3>Create New Invoice</h3>
        <form method="POST" action="">
            <input type="hidden" name="new_invoice" value="1">
            <label for="client_name">Client Name:</label>
            <input type="text" name="client_name" required><br><br>

            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" required><br><br>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
                <option value="pending">Pending</option>
                <option value="incomplete">Incomplete</option>
            </select><br><br>

            <button type="submit">Create Invoice</button>
        </form>
        <?php endif; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('.confirm-status-btn').on('click', function() {
                var invoiceId = $(this).closest('.status-form').data('invoice-id');
                var newStatus = $(this).closest('.status-form').find('.status-select').val();

                $.ajax({
                    url: '', 
                    type: 'POST',
                    data: {
                        invoice_id: invoiceId,
                        status: newStatus
                    },
                    success: function(response) {
                        $('#invoice-' + invoiceId).find('td:nth-child(5)').text(newStatus);
                    }
                });
            });

            $('form').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: '', 
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
 <!-- Include footer.php here -->
    <?php include '../template/footer.php'; ?>