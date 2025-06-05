<?php
session_start();
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Page</title>
  <link href="output.css" rel="stylesheet" />
  <link rel="icon" href="gikonko.png" type="image/png">
</head>
<body class="bg-green-100 min-h-screen flex flex-col font-sans">

  <header class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <?php include("userDashboard.php"); ?>
  </header>

  <main class="flex-grow pt-24 px-6 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl p-10 max-w-3xl w-full text-center border border-green-300">
      <h1 class="text-3xl font-extrabold text-green-700 mb-6">
        Welcome, <span class="text-blue-700"><?php echo $_SESSION['Firstname']; ?></span> 👋
      </h1>
      <p class="text-lg text-gray-700">
        You are now logged in to the <strong>GIKONKO TSS Trainee Management System</strong>. Use the menu above to access your marks.
      </p>


    </div>
  </main>

 
  <footer class="bg-blue-500 text-center py-4 shadow-inner text-sm text-white">
    &copy; <?php echo date("Y"); ?> GIKONKO TSS. All rights reserved.
  </footer>

</body>
</html>
