<?php
include('../env/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['Patient-New-Name']) ? $_POST['Patient-New-Name'] : '';
    $age = isset($_POST['Patient-New-Age']) ? $_POST['Patient-New-Age'] : '';
    $gender = isset($_POST['Patient-New-Gender']) ? $_POST['Patient-New-Gender'] : '';
    $birthdate = isset($_POST['Patient-New-Birthdate']) ? $_POST['Patient-New-Birthdate'] : '';
    $student_number = isset($_POST['Patient-New-StudentNumber']) ? $_POST['Patient-New-StudentNumber'] : '';
    $year_level = isset($_POST['Patient-New-YearLevel']) ? $_POST['Patient-New-YearLevel'] : '';
    $section = isset($_POST['Patient-New-Section']) ? $_POST['Patient-New-Section'] : '';

    $illness1 = isset($_POST['Patient-New-Illness-1']) ? $_POST['Patient-New-Illness-1'] : null;
    $illness1_date = isset($_POST['Patient-New-Illness-Date-1']) ? $_POST['Patient-New-Illness-Date-1'] : null;
    $illness2 = isset($_POST['Patient-New-Illness-2']) ? $_POST['Patient-New-Illness-2'] : null;
    $illness2_date = isset($_POST['Patient-New-Illness-Date-2']) ? $_POST['Patient-New-Illness-Date-2'] : null;
    $illness3 = isset($_POST['Patient-New-Illness-3']) ? $_POST['Patient-New-Illness-3'] : null;
    $illness3_date = isset($_POST['Patient-New-Illness-Date-3']) ? $_POST['Patient-New-Illness-Date-3'] : null;

    $phone = isset($_POST['Patient-New-Phonenumber']) ? $_POST['Patient-New-Phonenumber'] : null;
    $email = isset($_POST['Patient-New-Email']) ? $_POST['Patient-New-Email'] : null;
    $address = isset($_POST['Patient-New-Address']) ? $_POST['Patient-New-Address'] : null;
    $height = isset($_POST['Patient-New-Height']) ? $_POST['Patient-New-Height'] : null;
    $weight = isset($_POST['Patient-New-Weight']) ? $_POST['Patient-New-Weight'] : null;

    $prescription1 = isset($_POST['Patient-New-Prescription-1']) ? $_POST['Patient-New-Prescription-1'] : null;
    $prescription2 = isset($_POST['Patient-New-Prescription-2']) ? $_POST['Patient-New-Prescription-2'] : null;
    $prescription3 = isset($_POST['Patient-New-Prescription-3']) ? $_POST['Patient-New-Prescription-3'] : null;

    $check_sql = "SELECT * FROM Patient_Records_Table WHERE Student_Number = '$student_number' OR Email = '$email'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "
            <script>
                alert('A patient with the same Student Number or Email already exists in the system.');
                location.replace('../../web/Admin.php');
            </script>
        ";
    } else {
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
                    location.replace('../../web/Admin.php');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Error: " . $conn->error . "');
                </script>
            ";
        }
    }
}

$conn->close();
