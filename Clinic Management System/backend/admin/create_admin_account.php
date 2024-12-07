<?php
include('../env/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $get_account_name = $_POST['Admin-New-AccountName'];
    $get_username = $_POST['Admin-New-Username'];
    $get_email = $_POST['Admin-New-Email'];
    $get_password = $_POST['Admin-New-Password'];

    $Account_Name = $get_account_name;
    $Username = mysqli_real_escape_string($conn, $get_username);
    $Email = mysqli_real_escape_string($conn, $get_email);
    $Password = mysqli_real_escape_string($conn, $get_password);

    $Validate_Entry = $conn->query("SELECT * FROM Administrator_Table WHERE Username = '$Username' OR Email = '$Email';");

    if ($Validate_Entry->num_rows > 0) {
        echo "<script>alert('Account creation failed: The provided Username or Email is already associated with an existing account.'); location.replace('../../web/Admin.php');</script>";
    } else {
        $Create_Account = $conn->query("INSERT INTO Administrator_Table(Account_Name, Username, Email, Password) VALUES ('$Account_Name', '$Username', '$Email', '$Password');");
        if ($Create_Account) {
            echo "<script>alert('Account created successfully!'); location.replace('../../web/Admin.php');</script>";
        } else {
            echo "<script>alert('An error occurred while creating the account. Please try again later.'); location.replace('../../web/Admin.php');</script>";
        }
    }
}
