<?php
include('../env/database_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['record_no'])) {
    $recordNo = $_GET['record_no'];
    $sql = "DELETE FROM Patient_Records_Table WHERE Record_No = '$recordNo';";

    if ($conn->query($sql) === TRUE) {
        echo "Account deleted successfully!";
    } else {
        echo "Error deleting account: " . $conn->error;
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['search'])) {
        $Search_Data = $_GET['search'];
        $Get_Data = "SELECT * FROM Patient_Records_Table 
                     WHERE Record_No = '$Search_Data'
                     OR Name = '$Search_Data'
                     OR Student_Number = '$Search_Data'
                     OR Student_Year_Level = '$Search_Data'
                     OR Section = '$Search_Data'
                     OR Phone_Number = '$Search_Data'
                     OR Email = '$Search_Data'
                     OR Address = '$Search_Data'
                     OR Height = '$Search_Data'
                     OR Weight = '$Search_Data'";
    } else {
        $Get_Data = "SELECT Record_No, Image, Name, Age, Gender, Birthdate, Student_Number, Student_Year_Level, 
                            Section, Phone_Number, Email, Address, Height, Weight, Illness1, Illness1_Date, 
                            Illness2, Illness2_Date, Illness3, Illness3_Date, Prescription1, Prescription2, 
                            Prescription3 FROM Patient_Records_Table";
    }

    $query = $conn->query($Get_Data);

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            if ($row['Image'] != "" || $row['Image'] != null) {
                $row['Image'] = base64_encode($row['Image']);
                $row['Image'] = 'data:image/jpeg;base64,' . $row['Image'];
            } else {
                $row['Image'] = "";
            }
            $patients[] = $row;
        }
        echo json_encode($patients);
    } else {
        echo json_encode([]);
    }
    exit;
}
