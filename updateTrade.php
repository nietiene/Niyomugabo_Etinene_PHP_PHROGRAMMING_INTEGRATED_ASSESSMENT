<?php
 
     include ("conn.php");
     if (isset($_GET['Trade_id'])) {
          $Trade_Id = $_GET['Trade_id'];
          $sql = "SELECT * FROM trades WHERE Trade_id = $Trade_Id";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            $Data = mysqli_fetch_assoc($result);
          } else {
            die("ERROR:" . mysqli_error($conn));
          }
    }

          
   if (isset($_POST['save'])) {
         if (!empty($_POST['Trade_name'])) {
             $Trade_Id = $_POST['Trade_id'];
             $Trade_Name = $_POST['Trade_name'];
      
              $sql = "UPDATE trades SET Trade_name = '$Trade_Name' WHERE Trade_id = '$Trade_Id'";
              $query = mysqli_query($conn, $sql);

              if ($query) {
                   header("Location:listOfTrades.php");
              } else {
                  die ("ERROR:". mysqli_error($conn));
              }

           }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trade</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-green-100 flex justify-center items-center">
    <form method="post" class="bg-blue-700 w-full rounded-lg max-w-sm px-4 shadow-2xl">
      <h1 class="text-2xl text-green-500 font-semibold mb-6 text-center underline">Update Trade</h1>
        <label class="block text-green-500 font-semibold text-lg">Trade Code</label>
        <input type="text" name="Trade_id" value=<?php echo $Data['Trade_id']?> readonly
        class="py-2 w-full focus:ring-2 focus:outline-blue-200 focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6"> <br>

        <label class="block text-green-500 font-semibold text-lg">Trade Name</label>
        <input type="text" name="Trade_name" value=<?php echo $Data['Trade_name']?>
        class="py-2 w-full focus:ring-2 focus:outline-blue-200 focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6"> <br>
 
        <div class="flex justify-between">
              <button name="save" class="bg-green-500 px-5 py-2 mb-4 rounded-lg shadow-md text-white hover:bg-green-600">Add New</button>
             <a href="Dashboard.php" class="bg-red-500 px-5 py-2 mb-4 rounded-lg shadow-md text-white hover:bg-red-600">Back</a>
         </div>
    </form>

    <?php



   ?>
</body>
</html>