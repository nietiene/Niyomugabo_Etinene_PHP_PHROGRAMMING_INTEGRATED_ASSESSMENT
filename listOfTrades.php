<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lsit Of Trade</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 max-h-screen flex justify-center items-center px-4">
    <div class="bg-blue-200 shadow-2xl rounded-xl p-6 w-full max-w-6xl">
    <h1 class="text-center font-semibold text-2xl text-green-700 mb-6">List Of Trades</h1>
    <div class="flex justify-end mb-6">
        <a href="addTrade.php" class="bg-green-500 px-4 py-2 rounded-lg shadow-lg text-white hover:bg-green-700">Add New</a>
    </div>

    <div class="overflow-x-auto rounded-sm">
    <table border="2" class="min-w-full border-blue-400 border text-sm ">
        <tr class="bg-green-500 text-blue-800">
            <th class="px-4 py-2 border-b">Trade Code</th>
            <th class="px-4 py-2 border-b">Trade Name</th>
            <th colspan="2" class="px-4 py-2 border-b">Modification</th>
        </tr>

        <?php
           include("conn.php");
          
           $sql = "SELECT * FROM trades";
           $query = mysqli_query($conn, $sql);

         if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
                echo 
                "
                 <tr>
                    <td>{$data['Trade_id']}</td>
                    <td>{$data['Trade_name']}</td>
                    <td><a href='updateTrade.php?Trade_id={$data['Trade_id']}'>Update</a></td>
                    <td><a href='deleteTrade.php?Trade_id={$data['Trade_id']}'>Update</a></td>
                 </tr>
                ";
            }
         }

       ?>
       </div>
       </div>
    </table>
</body>
</html>