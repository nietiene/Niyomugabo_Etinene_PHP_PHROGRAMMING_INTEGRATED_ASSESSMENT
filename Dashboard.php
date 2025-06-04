<?php

   session_start();

    if (!isset($_SESSION['Usename'])) {
      $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOS Dashboard</title>
    <link href="output.css" rel="stylesheet">
</head>
<body class="bg-green-100 min-h-screen">
    <div class="bg-blue-500 shadow-2xl">
      <nav class="container mx-auto flex justify-between items-center py-4 px-6">
        <ul class="flex space-x-6 text-white font-semibold">
           <li><a href="listOfTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Trainee</a></li>
           <li><a href="listOfTrades.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Trades</a></li>
           <li><a href="listOfModule.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Modules</a></li>
           <li><a href="listOfMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Marks Of Student</a></li>
           <li><a href="addTrade.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Trade</a></li>
           <li><a href="addTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Trainee</a></li>
           <li><a href="addModule.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Module</a></li>
           <li><a href="addMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Add Marks To Trainee</a></li>
           <li><a href="competent.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of Competent Trainees</a></li>
           <li><a href="notCompetent.php" class="hover:text-blue-800 hover:underline transition duration-200">List Of NYC Trainees</a></li>
         </ul>
           <div class="flex justify-end">
               <a href="logout.php" class="text-white rounded-lg hover:bg-red-700 bg-red-500 py-1 px-4 transition duration-200">Logout</a>
           </div>   
      </nav> 
   </div>

   <div class="flex justify-center items-center mt-16">
      <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl text-center">
         <h2 class="font-semibold text-2xl text-green-500">Welcome <strong><u><?php echo $_SESSION['Usename'];?></u></strong> In Gikonko Tss Management system</h2> 
      </div>
        
   </div>
   
</body>
</html>