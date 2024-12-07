<?php
include('../env/database_connection.php');
session_start();

$countResults = [
    'admin_count' => 0,
    'patient_count' => 0,
    'get_user_id' => null,
    'account_name' => null
];

if (isset($_SESSION['get_user_id'])) {
    $countResults['get_user_id'] = $_SESSION['get_user_id'];
}

try {
    if ($countResults['get_user_id']) {
        $get_Account_Name = $conn->prepare("SELECT Account_Name FROM Administrator_Table WHERE Account_No = ?");
        $get_Account_Name->bind_param("i", $countResults['get_user_id']);
        $get_Account_Name->execute();
        $result = $get_Account_Name->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $countResults['account_name'] = $row['Account_Name'];
        }

        $get_Account_Count = "SELECT COUNT(*) AS admin_count FROM Administrator_Table";
        $Admin_Count = $conn->query($get_Account_Count);
        if ($Admin_Count->num_rows > 0) {
            $row = $Admin_Count->fetch_assoc();
            $countResults['admin_count'] = $row['admin_count'];
        }

        $get_Patient_Record_Count = "SELECT COUNT(*) AS patient_count FROM Patient_Records_Table";
        $Patient_Record_Count = $conn->query($get_Patient_Record_Count);
        if ($Patient_Record_Count->num_rows > 0) {
            $row = $Patient_Record_Count->fetch_assoc();
            $countResults['patient_count'] = $row['patient_count'];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($countResults);
} catch (Exception $e) {
    echo json_encode(['error' => 'Failed to retrieve data: ' . $e->getMessage()]);
}
