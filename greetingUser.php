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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php include("Dashboard.php"); ?>
   <div class="flex justify-center items-center p-9">
      <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl text-center">
         <h2 class="font-semibold text-2xl text-green-500">Welcome <strong><u><?php echo $_SESSION['Usename'];?></u></strong> In Gikonko Tss Management system</h2> 
      </div>
   </div>
</body>
</html>