<?php
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "clinic_management_system_db";

try {
    $conn = new mysqli($serverName, $username, $password, $databaseName);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    echo "<script>
        alert('Sorry, we’re having trouble connecting to the database. Please check if database is active.');
        location.replace('../../index.php');
    </script>";
    exit;
}
?>