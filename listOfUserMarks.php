<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's User</title>
</head>
<body>
    <table>
        <tr>
             <th>Trainee Code</th>
             <th>Trainee Name</th>
             <th>Module Code</th>
             <th>Module Name</th>
             <th>Formative Assessment /50</th>
             <th>Summative Assessment /50</th>
             <th>Total Marks</th>
             <th>Decision</th>
        </tr>

        <tbody>
            <?php
                 session_start();
                 include("conn.php");

                 $Trainee_Id = $_SESSION['Trainee_id'];
                 $sql = "SELECT t.Trainee_id,
                         CONCAT(t.Firstname, ' ', t.lastname) AS Trainee Name,
                         m.Module_Id, md.Module_Name,
                         m.Formative_Assessment,
                         m.Summative_Assessment,
                         m.Total_Marks,
                         m.decision
                         FROM trainees t  JOIN marks m ON t.Trainee_id = m.Trainee_Id
                         JOIN modules md ON m.Module_Id = md.Module_Id
                         WHERE t.Trainee_id = '$Trainee_Id'
                         ";
            ?>
        </tbody>
    </table>
</body>
</html>