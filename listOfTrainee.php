<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Trainee</title>
 <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</head>
<body>
  <h1>List Of Trainees</h1>  
   <table border="2" cellspacing="2" cellpadding="5">
       <tr> 
           <th>Trainee Code</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Gender</th>
           <th>Trade Code</th>
       </tr>

       <?php
            include('conn.php');
            $sql = "SELECT * FROM `trainees`";
            $query = mysqli_query($conn, $sql);
            
            while ($data = mysqli_fetch_assoc($query)) {
                echo
                 "
                    <tr>
                       <td>{$data['Trainee_Id']}</td>
                       <td>{$data['Firstname']}</td>
                       <td>{$data['lastname']}</td>
                       <td>{$data['Gender']}</td>
                       <td>{$data['Trade_id']}</td>
                    </tr>
                ";
            }

      ?>
   </table>
</body>
</html>