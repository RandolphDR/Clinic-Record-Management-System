<?php
include('../env/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $get_account_number = $_POST['Admin-Edit-AccountNo'];
    $get_account_name = $_POST['Admin-Edit-Account-Name'];
    $get_username = $_POST['Admin-Edit-Username'];
    $get_email = $_POST['Admin-Edit-Email'];
    $get_password = $_POST['Admin-Edit-Password'];

    $account_number = $get_account_number;
    $account_name = mysqli_real_escape_string($conn, $get_account_name);
    $username = mysqli_real_escape_string($conn, $get_username);
    $email = mysqli_real_escape_string($conn, $get_email);
    $password = mysqli_real_escape_string($conn, $get_password);

    $update_query = "UPDATE Administrator_Table SET 
                     Account_Name = '$account_name', 
                     Username = '$username', 
                     Email = '$email', 
                     Password = '$password' 
                     WHERE Account_No = '$account_number';";

    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Account updated successfully!'); location.replace('../../web/Admin.php');</script>";
    } else {
        echo "<script>alert('Error updating account: " . $conn->error . "'); location.replace('../../web/Admin.php');</script>";
    }
}
