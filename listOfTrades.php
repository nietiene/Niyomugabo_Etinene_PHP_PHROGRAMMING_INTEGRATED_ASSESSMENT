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
    <title>List Of Trade</title>
    <link href="output.css" rel="stylesheet" />
    <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="bg-green-100 min-h-screen flex flex-col">


    <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white">
        <?php include("Dashboard.php"); ?>
    </header>

    <main class="flex-grow pt-20 px-4 flex items-center justify-center">
        <div class="bg-blue-200 shadow-2xl rounded-xl p-6 w-full max-w-4xl min-h-[50vh] flex flex-col justify-between">

            <div class="flex justify-between mb-6 items-center">
                <h1 class="text-center font-semibold text-2xl text-green-700 mb-6">List Of Trades</h1>
                <div class="space-x-4">
                    <a href="addTrade.php" class="bg-green-500 px-4 py-2 rounded-lg shadow-lg text-white hover:bg-green-700 transition duration-200">Add New</a>
                    <a href="greetingUser.php" class="bg-red-500 px-4 py-2 rounded-lg shadow-lg text-white hover:bg-red-700 transition duration-200">Back</a>
                </div>
            </div>

            <div class="overflow-x-auto rounded-sm flex-grow">
                <table border="2" class="min-w-full border-blue-400 border text-sm shadow-lg">
                    <thead>
                        <tr class="bg-green-500 text-blue-800">
                            <th class="px-4 py-2 border-b border-blue-500">Trade Code</th>
                            <th class="px-4 py-2 border-b border-blue-500">Trade Name</th>
                            <th colspan="2" class="px-4 py-2 border-b border-blue-500">Modification</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                       include("conn.php");
                       $sql = "SELECT * FROM trades";
                       $query = mysqli_query($conn, $sql);

                       if (mysqli_num_rows($query) > 0) {
                           while ($data = mysqli_fetch_assoc($query)) {
                               echo 
                               "
                                 <tr class='text-blue-800 font-semibold hover:bg-green-500'>
                                    <td class='px-4 py-2 border-b border-e border-blue-500'>{$data['Trade_id']}</td>
                                    <td class='px-4 text-center py-2 border-b border-e border-blue-500'>{$data['Trade_name']}</td>
                                    <td class='px-4 py-2 border-b border-blue-500'><a href='updateTrade.php?Trade_id={$data['Trade_id']}' class='hover:underline'>Update</a></td>
                                    <td class='px-4 py-2 border-b border-blue-500'><a href='deleteTrade.php?Trade_id={$data['Trade_id']}' class='hover:underline text-red-500'>Delete</a></td>
                                 </tr>
                               ";
                           }
                       }
                   ?>
                   </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
