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
    <div class="bg-blue-500 shadow-lg">
      <nav class="container mx-auto flex justify-between items-center py-4 px-6">
        <ul class="flex space-x-6 text-white font-semibold">
           <li><a href="listOfTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Trainee</a></li>
           <li><a href="listOfTrades.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Trades</a></li>
           <li><a href="listOfMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Marks Of Student</a></li>
           <li><a href="addTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Trainee</a></li>
           <li><a href="addModule.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Module</a></li>
           <li><a href="addMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Marks To Trainee</a></li>
         </ul>
           <div class="flex justify-end">
               <a href="logout.php" class="text-white rounded-lg hover:bg-red-700 bg-red-500 py-1 px-4 transition duration-200">Logout</a>
           </div>   
      </nav> 
   </div>

  <h2>Welcome <?php echo $_SESSION['Usename'];?></h2> <br>

</body>
</html>