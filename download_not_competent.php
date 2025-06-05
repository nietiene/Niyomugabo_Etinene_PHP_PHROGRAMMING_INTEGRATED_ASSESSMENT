<?php
include("conn.php");
session_start();

if (!isset($_SESSION['Usename'])) {
    header("Location: login.php");
    exit();
}

// setting up headers
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="not_competent_trainee.csv"');

//open file in the stream
$output = fopen("php://output", "w");

// create column in the excel
fputcsv($output, ['Trainee Code', 'Trainee Name', 'Module Code', 'Module Name', 'Decision']);

$sql = "SELECT m.Trainee_Id, 
        CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
        m.Module_Id,
        md.Module_Name,
        m.decision,
        m.Total_Marks
        FROM marks m 
        JOIN Trainees t ON t.Trainee_Id = m.Trainee_Id
        JOIN modules md ON m.Module_Id = md.Module_Id
        HAVING m.Total_Marks < 70";

$query = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($query)) {
    fputcsv($output, [
        $data['Trainee_Id'],
        $data['Trainee_Name'],
        $data['Module_Id'],
        $data['Module_Name'],
        $data['decision']
    ]);
}

fclose($output);
exit();
?>
