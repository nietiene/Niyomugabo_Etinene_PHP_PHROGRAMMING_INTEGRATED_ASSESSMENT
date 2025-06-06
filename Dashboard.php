<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DOS Dashboard</title>
  <link href="output.css" rel="stylesheet" />
  <link rel="icon" type="/png" href="gikonko.png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-green-100 min-h-screen">
  <div class="bg-blue-500 shadow-2xl fixed top-0 right-0 left-0 z-50">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between" x-data="{ open: false }">
 
      <div class="flex items-center space-x-4">
        <div class="w-13 h-12 rounded-full overflow-hidden border-2 border-green-500 shadow-md">
          <img src="gikonko.png" alt="logo" class="w-full h-full object-cover">
        </div>
        <span class="text-white font-bold text-lg">GIKONKO TSS</span>
      </div>


      <div class="md:hidden">
        <button @click="open = !open" class="text-white focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>


      <ul class="hidden md:flex space-x-6 text-white font-semibold">
        <li><a href="listOfTrainee.php" class="hover:text-blue-800 hover:underline transition duration-200">Trainees</a></li>
        <li><a href="listOfTrades.php" class="hover:text-blue-800 hover:underline transition duration-200">Trades</a></li>
        <li><a href="listOfModule.php" class="hover:text-blue-800 hover:underline transition duration-200">Modules</a></li>
        <li><a href="listOfMarks.php" class="hover:text-blue-800 hover:underline transition duration-200">Marks</a></li>
        <li><a href="competent.php" class="hover:text-blue-800 hover:underline transition duration-200">Competent</a></li>
        <li><a href="notCompetent.php" class="hover:text-blue-800 hover:underline transition duration-200">NYC Trainees</a></li>
      </ul>

      <div class="hidden md:block">
        <a href="logout.php"
           class="text-white rounded-lg hover:bg-red-700 bg-red-500 py-1 px-4 transition duration-200">
          Logout
        </a>
      </div>
    </nav>

 
    <div x-show="open" class="md:hidden px-4 pb-4 text-white font-semibold space-y-2">
      <a href="listOfTrainee.php" class="block hover:text-blue-200">Trainees</a>
      <a href="listOfTrades.php" class="block hover:text-blue-200">Trades</a>
      <a href="listOfModule.php" class="block hover:text-blue-200">Modules</a>
      <a href="listOfMarks.php" class="block hover:text-blue-200">Marks</a>
      <a href="competent.php" class="block hover:text-blue-200">Competent</a>
      <a href="notCompetent.php" class="block hover:text-blue-200">NYC Trainees</a>
      <a href="logout.php" class="block bg-red-500 mt-2 w-max px-4 py-1 rounded-lg hover:bg-red-600">Logout</a>
    </div>
  </div>
</body>
</html>
