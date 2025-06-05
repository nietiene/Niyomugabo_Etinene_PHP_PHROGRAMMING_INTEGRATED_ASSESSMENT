<?php
   include("conn.php");
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome</title>
  <link href="output.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-green-100 flex flex-col">


  <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white h-16 flex items-center px-4">
    <?php include("Dashboard.php"); ?>
  </header>


  <main class="flex-grow pt-24 flex justify-center items-center px-4">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl text-center">
      <h2 class="font-semibold text-2xl text-green-600">
        Welcome <strong><u><?php echo htmlspecialchars($_SESSION['Usename']); ?></u></strong> to Gikonko TSS Management System
      </h2>
    </div>
  </main>

</body>
</html>
