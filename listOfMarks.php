<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Marks</title>
</head>
<body>
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
        </tr>
       
     <?php
         include ("conn.php");
          $sql = "SELECT m.Mark.id, m.Trainee.Id, m.Module.id, m.Formative_Assessment
                  m.Summative_Assessment t.Trainee.name md.Module_Name FROM marks m
                  JOIN trainees t ON m.Trainee.id = t.Trainee.id 
                  JOIN modules md ON m.Module.id = md.Module.id
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
                   <td>{$data['decision']}</td>
               ";
          }

     ?>
    </table>
</body>
</html>