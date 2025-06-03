<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Marks</title>
</head>
<body>
    <li><a href="addMarks.php">Add Marks To Trainee</a></li>
    <table border="2" cellpadding="5" cellspacing="2">
       <tr>
          <th>Mark Code</th>
          <th>Trainee Code</th>
          <th>Trainee Name</th>
          <th>Module Code</th>
          <th>Module Name</th>
          <th>Formative Assessment /50</th>
          <th>Formative Assessment /50</th>
          <th>Total /100</th>
          <th>Decision</th>
          <th colspan="2">Modification</th>
        </tr>
       
     <?php
         include ("conn.php");
         $sql = " SELECT m.Mark_Id, 
                  m.Trainee_Id, 
                  CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name, 
                  m.Module_Id, 
                  md.Module_Name,
                  m.Formative_Assessment,
                  m.Summative_Assessment,
                  m.Total_Marks,
                  m.Decision
                  FROM marks m
                  JOIN trainees t ON m.Trainee_Id = t.Trainee_Id 
                  JOIN modules md ON m.Module_Id = md.Module_Id
                  ORDER BY m.Trainee_Id ASC
                  ";
                  
          $query = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_assoc($query)) {
            echo 
               "
               <tr>
                   <td>{$data['Mark_Id']}</td>
                   <td>{$data['Trainee_Id']}</td>
                   <td>{$data['Trainee_Name']}</td>
                   <td>{$data['Module_Id']}</td>
                   <td>{$data['Module_Name']}</td>
                   <td>{$data['Formative_Assessment']}</td>
                   <td>{$data['Summative_Assessment']}</td>
                   <td>{$data['Total_Marks']}</td>
                   <td>{$data['Decision']}</td>
                   <td><a href='update.php?Mark_Id={$data['Mark_Id']}'>Update</a></td>
                   <td><a href='delete.php?Mark_Id={$data['Mark_Id']}'>Delete</a></td>
               ";
          }

     ?>
    </table>
</body>
</html>