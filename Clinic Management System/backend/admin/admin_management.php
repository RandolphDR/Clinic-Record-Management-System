<?php
include('../env/database_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['account_no'])) {
    $accountNo = $_GET['account_no'];
    $sql = "DELETE FROM Administrator_Table WHERE Account_No = '$accountNo';";

    if ($conn->query($sql) === TRUE) {
        echo "Account deleted successfully!";
    } else {
        echo "Error deleting account: " . $conn->error;
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
        $sql = "SELECT * FROM Administrator_Table 
                WHERE Account_No = '$searchQuery'
                OR Account_Name = '$searchQuery' 
                OR Username = '$searchQuery' 
                OR Email = '$searchQuery'";
    } else {
        $sql = "SELECT * FROM Administrator_Table";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }
        echo json_encode($admins);
    } else {
        echo json_encode([]);
    }
    exit;
}
