<?php
// Get all files in the current directory
$files = scandir(".");

// Filter to get only PHP files
$phpFiles = array_filter($files, function($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === "php";
});

// Display the list of PHP files
echo "<ul>";
foreach ($phpFiles as $file) {
    echo "<li>$file</li>";
}
echo "</ul>";
?>
