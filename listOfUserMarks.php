<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's User</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <table border="2">
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

              if (isset($_GET['Trainee_Id'])) {  

                 $Trainee_Id = $_GET['Trainee_Id'];
                 $sql = "SELECT t.Trainee_Id,
                         CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
                         m.Module_Id, md.Module_Name,
                         m.Formative_Assessment,
                         m.Summative_Assessment,
                         m.Total_Marks,
                         m.decision
                         FROM trainees t  
                         JOIN marks m ON t.Trainee_Id = m.Trainee_Id
                         JOIN modules md ON m.Module_Id = md.Module_Id
                         WHERE t.Trainee_id = '$Trainee_Id'
                         ";
                         $query = mysqli_query($conn, $sql);
                  
                  if (mysqli_num_rows($query)) {
                    while($data = mysqli_fetch_assoc($query)) {
                        echo 
                        "
                          <tr>
                             <td>{$data['Trainee_Id']}</td>
                             <td>{$data['Trainee_Name']}</td>
                             <td>{$data['Module_Id']}</td>
                             <td>{$data['Module_Name']}</td>
                             <td>{$data['Formative_Assessment']}</td>
                             <td>{$data['Summative_Assessment']}</td>
                             <td>{$data['Total_Marks']}</td>
                             <td>{$data['decision']}</td>
                          </tr>
                        ";
                    }
                  }
            }
            ?>
        </tbody>
    </table>
</body>
</html>