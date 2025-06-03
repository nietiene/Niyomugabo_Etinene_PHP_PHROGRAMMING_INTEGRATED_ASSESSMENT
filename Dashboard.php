<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOS Dashboard</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['Usename'];?></h2> <br>
    <a href="listOfTrainee.php">Manage User</a>
</body>
</html>