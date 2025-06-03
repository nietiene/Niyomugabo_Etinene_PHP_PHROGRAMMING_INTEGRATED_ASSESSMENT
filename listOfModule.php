<?php
   include("conn.php");
   $sql = "SELECT m.Module_Id,
           m.Module_Name,
           m.Trade_Id
           t.Trade_Name
           FROM modules m 
           JOIN trades d
           ON t.Trade_Id = m.Trade_Id";
   $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Modules</title>
</head>
<body>
    <table border="2" cellspacing="2" cellpadding="5">
        <tr>
          <th>Module Code</th>
          <t h>Module Name</th>
          <th>Trade Code</th>
          <th>Trade Name</th>
          <th colspan="2">Modification</th>
        </tr>

        <?php
         

       ?>
    </table>
</body>
</html>