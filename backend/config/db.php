<?php
// Database connection variables
define('DB_SERVER', 'srv1713.hstgr.io');
define('DB_USERNAME', 'u967747021_RadiantStaff');  // Updated MySQL user
define('DB_PASSWORD', '3Bgm+Radiant#123!');  // Your MySQL password
define('DB_DATABASE', 'u967747021_RADIANTSTAFF');  // Updated MySQL database name

// Establish a database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
