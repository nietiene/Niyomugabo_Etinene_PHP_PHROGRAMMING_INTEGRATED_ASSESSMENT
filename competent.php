<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competent List</title>
    <link href="output.css" rel="stylesheet">
</head>
<body>
    <h1>Competent List</h1>
    <a href="dashboard.php">Back</a>
    <table border="2">
        <thead>
            <tr>
                <th>Trainee Code</th>
                <th>Trainee Name</th>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Decision</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 include("conn.php");
               
                $sql = "SELECT m.Trainee_Id , 
                         CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
                         m.Module_Id,
                         md.Module_Name,
                         m.decision,
                         m.Total_Marks
                         FROM marks m 
                         JOIN Trainees t ON t.Trainee_Id = m.Trainee_Id
                         JOIN modules md ON m.Module_Id = md.Module_Id
                         HAVING m.Total_Marks >= 70";

                $query = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($query) > 0) {
                    while($data = mysqli_fetch_assoc($query)) {
                        echo 
                        "
                         <tr>
                             <td>{$data['Trainee_Id']}</td>
                             <td>{$data['Trainee_Name']}</td>
                             <td>{$data['Module_Id']}</td>
                             <td>{$data['Module_Name']}</td>
                             <td>{$data['decision']}</td>
                         </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='5'>No Record In table</td>";
                }

            ?>
        </tbody>
    </table>
</body>
</html>