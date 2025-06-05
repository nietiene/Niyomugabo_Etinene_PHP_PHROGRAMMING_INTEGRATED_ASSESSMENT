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
    <title>List Of Modules</title>
    <link href="output.css" rel="stylesheet">
    <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="min-h-screen bg-green-100 flex flex-col">

    <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white">
        <?php include("Dashboard.php"); ?>
    </header>


    <main class="flex-grow pt-20 px-4 flex items-center justify-center">
        <div class="bg-blue-300 shadow-2xl rounded-xl p-8 w-full max-w-6xl min-h-[60vh] flex flex-col justify-between">


            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl text-green-700 font-semibold w-full">List Of Modules</h1>
                <div class="space-x-3 flex justify-between w-full">
                    <a href="addModule.php" class="bg-green-500 py-2 px-4 text-white rounded-lg shadow-lg hover:bg-green-700 transition duration-200 ms-[55%]">Add New Module</a>
                    <a href="greetingUser.php" class="bg-red-500 py-2 px-4 text-white rounded-lg shadow-lg hover:bg-red-700 transition duration-200">Back</a>
                </div>
            </div>


            <div class="overflow-x-auto rounded-sm">
                <table class="min-w-full border border-blue-600 text-sm">
                    <thead>
                        <tr class="bg-green-500 text-blue-800">
                            <th class="px-4 py-3 border-b border-blue-500">Module Code</th>
                            <th class="px-4 py-3 border-b border-blue-500">Module Name</th>
                            <th class="px-4 py-3 border-b border-blue-500">Trade Code</th>
                            <th class="px-4 py-3 border-b border-blue-500">Trade Name</th>
                            <th colspan="2" class="px-4 py-3 border-b border-blue-500">Modification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("conn.php");

                            $sql = "SELECT
                                m.Module_Id,
                                m.Module_Name,
                                m.Trade_Id,
                                t.Trade_name
                                FROM modules m 
                                JOIN trades t
                                ON t.Trade_id = m.Trade_Id";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($data = mysqli_fetch_assoc($result)) {
                                    echo "
                                        <tr class='text-blue-900 hover:bg-green-500 font-medium'>
                                            <td class='px-4 py-3 border-b border-blue-500'>{$data['Module_Id']}</td>
                                            <td class='px-4 py-3 border-b border-blue-500'>{$data['Module_Name']}</td>
                                            <td class='px-4 py-3 border-b border-blue-500'>{$data['Trade_Id']}</td>
                                            <td class='px-4 py-3 border-b border-blue-500'>{$data['Trade_name']}</td>
                                            <td class='px-4 py-3 border-b border-blue-500 hover:underline'><a href='updateModule.php?Module_Id={$data['Module_Id']}'>Update</a></td>
                                            <td class='px-4 py-3 border-b border-blue-500 text-red-500 hover:underline'><a href='deleteModule.php?Module_Id={$data['Module_Id']}'>Delete</a></td>
                                        </tr>
                                    ";
                                } 
                            } else {
                                echo "
                                    <tr>
                                        <td colspan='6' class='text-center text-red-600 py-4 font-semibold'>No data found.</td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
