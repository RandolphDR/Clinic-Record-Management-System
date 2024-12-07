<?php
include('../env/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['Patient-Name']) ? $_POST['Patient-Name'] : '';
    $age = isset($_POST['Patient-Age']) ? $_POST['Patient-Age'] : '';
    $gender = isset($_POST['Patient-Gender']) ? $_POST['Patient-Gender'] : '';
    $birthdate = isset($_POST['Patient-Birthdate']) ? $_POST['Patient-Birthdate'] : '';
    $student_number = isset($_POST['Patient-StudentNo']) ? $_POST['Patient-StudentNo'] : '';
    $year_level = isset($_POST['Patient-Yearlvl']) ? $_POST['Patient-Yearlvl'] : '';
    $section = isset($_POST['Patient-Section']) ? $_POST['Patient-Section'] : '';

    $illness1 = isset($_POST['Patient-Illness-1']) ? $_POST['Patient-Illness-1'] : null;
    $illness1_date = isset($_POST['Patient-Illness-Date-1']) ? $_POST['Patient-Illness-Date-1'] : null;
    $illness2 = isset($_POST['Patient-Illness-2']) ? $_POST['Patient-Illness-2'] : null;
    $illness2_date = isset($_POST['Patient-Illness-Date-2']) ? $_POST['Patient-Illness-Date-2'] : null;
    $illness3 = isset($_POST['Patient-Illness-3']) ? $_POST['Patient-Illness-3'] : null;
    $illness3_date = isset($_POST['Patient-Illness-Date-3']) ? $_POST['Patient-Illness-Date-3'] : null;

    $phone = isset($_POST['Patient-PhoneNumber']) ? $_POST['Patient-PhoneNumber'] : null;
    $email = isset($_POST['Patient-Email']) ? $_POST['Patient-Email'] : null;
    $address = isset($_POST['Patient-Address']) ? $_POST['Patient-Address'] : null;
    $height = isset($_POST['Patient-Height']) ? $_POST['Patient-Height'] : null;
    $weight = isset($_POST['Patient-Weight']) ? $_POST['Patient-Weight'] : null;

    $prescription1 = isset($_POST['Patient-Prescription-1']) ? $_POST['Patient-Prescription-1'] : null;
    $prescription2 = isset($_POST['Patient-Prescription-2']) ? $_POST['Patient-Prescription-2'] : null;
    $prescription3 = isset($_POST['Patient-Prescription-3']) ? $_POST['Patient-Prescription-3'] : null;

    $Validation_Query = "SELECT * FROM Patient_Records_Table WHERE Student_Number = ? OR Email = ?";
    $Prepare_Validation_Query = $conn->prepare($Validation_Query);
    $Prepare_Validation_Query->bind_param("ss", $student_number, $email);
    $Prepare_Validation_Query->execute();
    $Result_Validation_Query = $Prepare_Validation_Query->get_result();

    if ($Result_Validation_Query->num_rows == 0) {
        if (isset($_FILES['image-upload']) && $_FILES['image-upload']['error'] == 0) {
            $image = addslashes(file_get_contents($_FILES['image-upload']['tmp_name']));
        } else {
            $image = null;
        }

        $sql = "INSERT INTO Patient_Records_Table (Image, Name, Age, Gender, Birthdate, Student_Number, Student_Year_Level, Section, Phone_Number, Email, Address, Height, Weight, Illness1, Illness1_Date, Illness2, Illness2_Date, Illness3, Illness3_Date, Prescription1, Prescription2, Prescription3) 
        VALUES ('$image', '$name', '$age', '$gender', '$birthdate', '$student_number', '$year_level', '$section', '$phone', '$email', '$address', '$height', '$weight', '$illness1', '$illness1_date', '$illness2', '$illness2_date', '$illness3', '$illness3_date', '$prescription1', '$prescription2', '$prescription3');";


        if ($conn->query($sql) === TRUE) {
            echo "
                <script>
                    alert('The new patient record has been successfully created.');
                    location.replace('../../index.php');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Error: " . $conn->error . "');
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('A patient with the same Student Number or Email already exists in the system.');
                location.replace('../../index.php');
            </script>
        ";
    }

}

$conn->close();
