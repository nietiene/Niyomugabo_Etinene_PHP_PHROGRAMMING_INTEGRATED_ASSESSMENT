<?php
session_start();
   include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="output.css" rel="stylesheet" />
</head>
<body>
    <header>
         <?php include("userDashboard.php"); ?>
    </header>

    <h1>Welcome <?php echo $_SESSION['Firstname'];?> in GIKONKO TSS Trainee managment system</h1>

</body>
</html>