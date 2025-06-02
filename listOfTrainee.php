<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Trainees</title>
 <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</head>
<body>
  <h1>List Of Trainees</h1>  
   <table border="2" cellspacing="2" cellpadding="7">
       <tr> 
           <th>Trainee Code</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Gender</th>
           <th>Trade Name</th>
       </tr>

       <?php
            include('conn.php');
            $sql = "SELECT t.Trainee_Id, t.Firstname, t.lastname, t.Gender, tr.Trade_Name FROM trainees t
            JOIN trades tr ON t.Trade_Id = tr.Trade_Id
            ";
            $query = mysqli_query($conn, $sql);
            
            while ($data = mysqli_fetch_assoc($query)) {
                echo
                 "
                    <tr>
                       <td>{$data['Trainee_Id']}</td>
                       <td>{$data['Firstname']}</td>
                       <td>{$data['lastname']}</td>
                       <td>{$data['Gender']}</td>
                       <td>{$data['Trade_Name']}</td>
                    </tr>
                ";
            }

      ?>
   </table>
</body>
</html>