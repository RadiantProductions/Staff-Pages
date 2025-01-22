<?php
$css_version = filemtime('_next/css/main.css'); 
$dashboard_version = filemtime('_next/css/dashboard.css');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="_next/css/main.css?v=<?php echo $css_version; ?>">
    <link rel="stylesheet" href="_next/css/dashboard.css?v=<?php echo $dashboard_version; ?>">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    include_once '../backend/config/db.php';
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    ?>
    <?php include '../template/menu.php'; ?>
    <h2>Welcome, <?php echo $user['username']; ?></h2>
    <p>Your role: <?php echo $user['role']; ?></p>

    <?php if ($user['role'] === 'Presenter'): ?>
        <p>You have limited access.</p>
    <?php else: ?>
        <p>As an <?php echo $user['role']; ?>, you have full access to the system.</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
    new Crate({
        server: '1323181634232782880',
        channel: '1323347258443305014',
    })
    </script> 

    <script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script> 
    <iframe src="https://azura.typicalmedia.net/public/radianthits/embed?theme=dark" frameborder="0" allowtransparency="true" style="width: 90%; min-height: 150px; border: 0;"></iframe>

    <div class="iframe-container">
        <iframe src="https://azura.typicalmedia.net/public/radianthits/schedule/embed?theme=dark" frameborder="0" allowtransparency="true" class="iframe"></iframe>
        <iframe src="https://azura.typicalmedia.net/public/radianthits/history?theme=dark" frameborder="0" allowtransparency="true" class="iframe"></iframe>
        <iframe src="https://azura.typicalmedia.net/public/radianthits/embed-requests?theme=dark" frameborder="0" allowtransparency="true" class="iframe"></iframe>
    </div>

    <div class="iframe-container">
        <iframe src="https://free.timeanddate.com/clock/i9q6pytb/n784/fn6/fs16/fcfff/tc000/pct/ftb/bas9/bat0/bacfff/pa14/tt0/tw1/th1/ta1/tb4" frameborder="0" width="33%" height="35%" allowtransparency="true" class="iframe-clock" class="iframe"></iframe>
         <script src="https://halfstaff.org/widgets/us-half-staff-flags.js"></script>
       
    </div>
     
     
    

    <!-- Include footer.php here -->
    <?php include '../template/footer.php'; ?>

</body>
</html>
