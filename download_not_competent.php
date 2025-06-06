<?php
include("conn.php");
session_start();

if (!isset($_SESSION['Usename'])) {
    header("Location: login.php");
    exit();
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="competent_trainee.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['Trainee Code', 'Trainee Name', 'Module Code', 'Module Name',, 'Trade_name', 'Decision']);

$sql = "SELECT m.Trainee_Id, 
        CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
        m.Module_Id,
        md.Module_Name,
        m.decision,
        m.Total_Marks,
        td.Trade_name
        FROM marks m 
        JOIN Trainees t ON t.Trainee_Id = m.Trainee_Id
        JOIN modules md ON m.Module_Id = md.Module_Id
        JOIN trades td ON td.Trade_id = t.Trade_id
        HAVING m.Total_Marks < 70";

$query = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($query)) {
    fputcsv($output, [
        $data['Trainee_Id'],
        $data['Trainee_Name'],
        $data['Module_Id'],
        $data['Module_Name'],
        $data['Trade_name'],
        $data['decision']
    ]);
}

fclose($output);
exit();
?>
