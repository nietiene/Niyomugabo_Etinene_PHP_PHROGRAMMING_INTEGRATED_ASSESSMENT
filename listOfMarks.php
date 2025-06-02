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
          <th>Module Code</th>
          <th>Formative Assessment /50</th>
          <th>Formative Assessment /50</th>
          <th>Total /100</th>
          <th>Decision</th>
        </tr>
       
     <?php
         include ("conn.php");
          $sql = "SELECT * FROM marks";
          $query = mysqli_query($sql);

          while ($data = mysqli_fetch_assoc($query)) {
            echo 
               "
               <tr>
                   <td>{}</td>
               
               "
          }

     ?>
    </table>
</body>
</html>