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
</head>
<body>
  <form action="" method="post">
    <h1>Welcome <?php echo $_SESSION['Firstname'];?></h1>
    <a href="listOfUserMarks.php?Trainee_id=<?php $_SESSION['Trainee_Id']; ?>">View your Marks</a>
  </form>
</body>
</html>