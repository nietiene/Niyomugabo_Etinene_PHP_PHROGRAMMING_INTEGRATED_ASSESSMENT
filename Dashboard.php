<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DOS Dashboard</title>
  <link href="output.css" rel="stylesheet">
  <link rel="icon" type="/png" href="gikonko.png" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 min-h-screen">
  <div class="bg-blue-500 shadow-2xl fixed top-0 right-0 left-0 z-50 ">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6">
      
<div class="flex items-center space-x-4">
<div class="w-13 h-12 rounded-full overflow-hidden border-2 border-green-500 shadow-md">
  <img src="gikonko.png" alt="logo" class="w-full h-full object-cover">
</div>

  <span class="text-white font-bold text-lg">GIKONKO TSS</span>
</div>


      <ul class="flex space-x-6 text-white font-semibold ">
        <li><a href="listOfTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">Trainees</a></li>
        <li><a href="listOfTrades.php" class="hover:text-blue-800 hover:underline transition duration-200">Trades</a></li>
        <li><a href="listOfModule.php" class="hover:text-blue-800 hover:underline transition duration-200">Modules</a></li>
        <li><a href="listOfMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Marks</a></li>
        <li><a href="competent.php" class="hover:text-blue-800 hover:underline transition duration-200">Competent</a></li>
        <li><a href="notCompetent.php" class="hover:text-blue-800 hover:underline transition duration-200">NYC Trainees</a></li>
      </ul>

      <div class="flex justify-end">
        <a href="logout.php" class="text-white rounded-lg hover:bg-red-700 bg-red-500 py-1 px-4 transition duration-200">Logout</a>
      </div>
    </nav>
  </div>

</body>
</html>
