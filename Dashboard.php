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
   <nav>
    <li><a href="listOfTrainee.php">List Of Trainee</a></li>
    <li><a href="listOfMarks.php">Marks Of Student</a></li>
    <li><a href="addTrainee.php">Add Trainee</a></li>
    <li><a href="addMarks.php">Add Marks To Trainee</a></li>
   </nav> 
  <h2>Welcome <?php echo $_SESSION['Usename'];?></h2> <br>
   
</body>
</html>