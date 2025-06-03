<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOS Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 min-h-screen">
    <div class="bg-blue-500 shadow-md">
      <nav class="container mx-auto flex justify-between items-center py-4 px-6">
        <ul class="flex space-x-6 text-white font-semibold">
           <li><a href="listOfTrainee.php" class="hover:underline text-blue-700">List Of Trainee</a></li>
           <li><a href="listOfTrades.php" class="hover:underline text-blue-700">List Of Trades</a></li>
           <li><a href="listOfMarks.php" class="hover:underline text-blue-700">Marks Of Student</a></li>
           <li><a href="addTrainee.php" class="hover:underline text-blue-700">Add Trainee</a></li>
           <li><a href="addMarks.php" class="hover:underline text-blue-700">Add Marks To Trainee</a></li>
         </ul>
      </nav> 
   </div>

  <h2>Welcome <?php echo $_SESSION['Usename'];?></h2> <br>
   
  <a href="logout.php">Logout</a>
</body>
</html>