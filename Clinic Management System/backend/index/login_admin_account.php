<?php
include('../env/database_connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $get_user_input = $_POST['Username_Email_Field'];
    $get_pass_input = $_POST['Password_Field'];

    $Username = mysqli_real_escape_string($conn, $get_user_input);
    $Password = mysqli_real_escape_string($conn, $get_pass_input);

    $Validate_Query = "SELECT * FROM Administrator_Table WHERE Username = ? OR Email = ?";
    $Validate_Connection = $conn->prepare($Validate_Query);
    $Validate_Connection->bind_param('ss', $Username, $Username);
    $Validate_Connection->execute();
    $Validate_Result = $Validate_Connection->get_result();

    if ($Validate_Result->num_rows >= 1) {
        $fetched_user = $Validate_Result->fetch_assoc();
        if ($Password === $fetched_user['Password']) {
            $_SESSION['get_user_id'] = $fetched_user['Account_No'];

            echo "<script>
                    alert('Welcome to Clinic Management System');
                    location.replace('../../web/Admin.php');
                  </script>";
        } else {
            echo "<script>alert('Incorrect Password!'); location.replace('../../index.php');</script>";
        }
    } else {
        echo "<script>alert('Incorrect Username or Email!'); location.replace('../../index.php');</script>";
    }
}

?>