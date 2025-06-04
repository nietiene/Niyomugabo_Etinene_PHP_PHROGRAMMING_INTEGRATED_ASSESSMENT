<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php include('dashboard.php'); ?>

   <div class="flex justify-center items-center">
      <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl text-center">
         <h2 class="font-semibold text-2xl text-green-500">Welcome <strong><u><?php echo $_SESSION['Usename'];?></u></strong> In Gikonko Tss Management system</h2> 
      </div>
        
   </div>
</body>
</html>