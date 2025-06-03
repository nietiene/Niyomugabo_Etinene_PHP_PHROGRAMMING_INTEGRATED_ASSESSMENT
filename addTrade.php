    <?php
          include("conn.php");

          $error = "";
          if (isset($_POST['add'])) {
           
            if (!empty($_POST['Trade_name'])) {
                 $Trade_Name = $_POST['Trade_name'];
                 $sql = "INSERT INTO trades(Trade_name) VALUES('$Trade_Name')";
                 $query = mysqli_query($conn, $sql);
                 if ($query) {
                     header("Location:listOfTrades.php");
                 } else {
                    die("ERROR:" . mysqli_error($conn));
                }
            } else {
                $error = "Please Trade Name Can't be blank !!!";
            }

          }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trade</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen bg-green-100 flex justify-center items-center">
    <form  method="post" class="bg-blue-700 w-full rounded-lg max-w-sm px-4 shadow-2xl">
       <h1 class="text-2xl text-green-500 font-semibold mb-6 text-center underline">Add New Trade</h1>
        <label class="block text-green-500 font-semibold text-lg">Trade Name:</label>
        <input type="text" name="Trade_name" 
        class="py-2 w-full focus:ring-2 focus:outline-blue-200 focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6"> <br>

        <div class="flex justify-between">
              <button name="add" class="bg-green-500 px-5 py-2 mb-4 rounded-lg shadow-md text-white hover:bg-green-600">Add New</button>
             <a href="Dashboard.php" class="bg-red-500 px-5 py-2 mb-4 rounded-lg shadow-md text-white hover:bg-red-600">Back</a>
         </div>
        </div>
    
     <?php if (!empty($error)): ?>
       <div class="bg-red-100 py-1 text-red-500 rounded border border-red-500 px-1 mb-4">
         <?php echo $error; ?>
       </div> 
       <?php endif; ?>
    </form>
</body>
</html>