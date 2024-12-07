<?php
include('../env/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $get_record_no = $_POST['Patient-Edit-RecordNo'];
    $get_name = $_POST['Patient-Edit-Name'];
    $get_age = $_POST['Patient-Edit-Age'];
    $get_gender = $_POST['Patient-Edit-Gender'];
    $get_birthdate = $_POST['Patient-Edit-Birthdate'];
    $get_student_number = $_POST['Patient-Edit-StudentNumber'];
    $get_student_year_level = $_POST['Patient-Edit-YearLevel'];
    $get_section = $_POST['Patient-Edit-Section'];
    $get_phone_number = $_POST['Patient-Edit-Phonenumber'];
    $get_email = $_POST['Patient-Edit-Email'];
    $get_address = $_POST['Patient-Edit-Address'];
    $get_height = $_POST['Patient-Edit-Height'];
    $get_weight = $_POST['Patient-Edit-Weight'];
    $get_illness1 = $_POST['Patient-Edit-Illness-1'];
    $get_illness1_date = $_POST['Patient-Edit-Illness-Date-1'];
    $get_illness2 = $_POST['Patient-Edit-Illness-2'];
    $get_illness2_date = $_POST['Patient-Edit-Illness-Date-2'];
    $get_illness3 = $_POST['Patient-Edit-Illness-3'];
    $get_illness3_date = $_POST['Patient-Edit-Illness-Date-3'];
    $get_prescription1 = $_POST['Patient-Edit-Prescription-1'];
    $get_prescription2 = $_POST['Patient-Edit-Prescription-2'];
    $get_prescription3 = $_POST['Patient-Edit-Prescription-3'];

    $record_no = $get_record_no;
    $name = mysqli_real_escape_string($conn, $get_name);
    $age = mysqli_real_escape_string($conn, $get_age);
    $gender = mysqli_real_escape_string($conn, $get_gender);
    $birthdate = mysqli_real_escape_string($conn, $get_birthdate);
    $student_number = mysqli_real_escape_string($conn, $get_student_number);
    $student_year_level = mysqli_real_escape_string($conn, $get_student_year_level);
    $section = mysqli_real_escape_string($conn, $get_section);
    $phone_number = mysqli_real_escape_string($conn, $get_phone_number);
    $email = mysqli_real_escape_string($conn, $get_email);
    $address = mysqli_real_escape_string($conn, $get_address);
    $height = mysqli_real_escape_string($conn, $get_height);
    $weight = mysqli_real_escape_string($conn, $get_weight);
    $illness1 = mysqli_real_escape_string($conn, $get_illness1);
    $illness1_date = mysqli_real_escape_string($conn, $get_illness1_date);
    $illness2 = mysqli_real_escape_string($conn, $get_illness2);
    $illness2_date = mysqli_real_escape_string($conn, $get_illness2_date);
    $illness3 = mysqli_real_escape_string($conn, $get_illness3);
    $illness3_date = mysqli_real_escape_string($conn, $get_illness3_date);
    $prescription1 = mysqli_real_escape_string($conn, $get_prescription1);
    $prescription2 = mysqli_real_escape_string($conn, $get_prescription2);
    $prescription3 = mysqli_real_escape_string($conn, $get_prescription3);

    if (isset($_FILES['Patient-Edit-Image']) && $_FILES['Patient-Edit-Image']['error'] == 0) {
        $image = addslashes(file_get_contents($_FILES['Patient-Edit-Image']['tmp_name']));
        $image_query_part = "Image = '$image',";
    } else {
        $image_query_part = "";
    }

    $update_query = "UPDATE Patient_Records_Table SET 
                 $image_query_part
                 Name = '$name', 
                 Age = '$age', 
                 Gender = '$gender', 
                 Birthdate = '$birthdate',
                 Student_Number = '$student_number', 
                 Student_Year_Level = '$student_year_level',
                 Section = '$section', 
                 Phone_Number = '$phone_number',
                 Email = '$email', 
                 Address = '$address', 
                 Height = '$height', 
                 Weight = '$weight', 
                 Illness1 = '$illness1', 
                 Illness1_Date = '$illness1_date',
                 Illness2 = '$illness2', 
                 Illness2_Date = '$illness2_date',
                 Illness3 = '$illness3', 
                 Illness3_Date = '$illness3_date', 
                 Prescription1 = '$prescription1', 
                 Prescription2 = '$prescription2', 
                 Prescription3 = '$prescription3'
                 WHERE Record_No = '$record_no';";


    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Patient record updated successfully!'); location.replace('../../web/Admin.php');</script>";
    } else {
        echo "<script>alert('Error updating patient record: " . $conn->error . "'); location.replace('../../web/Admin.php');</script>";
    }
}
