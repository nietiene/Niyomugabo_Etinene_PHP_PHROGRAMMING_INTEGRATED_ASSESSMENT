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
    
</body>
</html>