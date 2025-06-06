<?php
   include("conn.php");
   session_start();

   if (!isset($_SESSION['username'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location: loginStudent.php");
       exit();
   }
  
// Prevent caching
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>DOS Page</title>
  <link href="output.css" rel="stylesheet" />
  <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="min-h-screen bg-green-100 flex flex-col">

  <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white h-16 flex items-center px-4">
    <?php include("Dashboard.php"); ?>
  </header>

  <main class="flex-grow pt-24 flex justify-center items-center px-4">
    <form action="" method="post" class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl text-center">
      <h2 class="font-semibold text-2xl text-green-600">
        Welcome <strong><u><?php echo $_SESSION['username']; ?></u></strong> to GIKONKO TSS Trainee Management System
      </h2>
    </form>
  </main>

    
    <footer class="bg-blue-500 text-center py-4 shadow-inner text-sm text-white">
          &copy; <?php echo date("Y"); ?> GIKONKO TSS. All rights reserved.
  </footer>


  <script>

  history.pushState(null, "", location.href);
  window.onpopstate = function () {
    history.pushState(null, "", location.href);
  };
</script>

</script>
</body>
</html>
