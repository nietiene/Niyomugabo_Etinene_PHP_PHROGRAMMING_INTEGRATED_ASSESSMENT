<?php
   include("conn.php");
   session_start();

    if (!isset($_SESSION['username'])) {
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
    <title>List Of Trainees</title>
    <link href="output.css" rel="stylesheet" />
    <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="bg-green-100 min-h-screen flex flex-col">


    <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white">
        <?php include("Dashboard.php"); ?>
    </header>


    <main class="flex-grow pt-20 px-4 flex items-center justify-center">
        <div class="bg-blue-200 shadow-2xl rounded-xl p-6 w-full max-w-6xl min-h-[60vh] flex flex-col justify-between">

            <div class="flex justify-between mb-6 items-center">
                <h1 class="font-semibold text-2xl text-green-700 mb-6">List Of Trainees</h1>
                <div class="space-x-4">
                    <a href="addTrainee.php" class="bg-green-400 py-3 px-5 rounded-lg shadow-lg text-white hover:bg-green-600 transition duration-200">Add Trainee</a>
                    <a href="greetingUser.php" class="bg-red-400 py-3 px-5 rounded-lg shadow-lg text-white hover:bg-red-600 transition duration-200">← Back</a>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg flex-grow">
                <table border="2" cellspacing="2" cellpadding="7" class="min-w-full text-sm border border-blue-500 shadow-lg">
                    <tr class="bg-blue-500 text-green-400">
                        <th class="px-4 py-2">Trainee Code</th>
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Trade Code</th>
                        <th class="px-4 py-2">Trade Name</th>
                        <th colspan="2" class="px-4 py-2">Modification</th>
                    </tr>
                    <tbody>
                        <?php
                            include('conn.php');
                            $sql = "SELECT t.Trainee_Id, t.Firstname, t.lastname, t.Gender, t.Trade_Id, tr.Trade_Name FROM trainees t
                                    JOIN trades tr ON t.Trade_Id = tr.Trade_Id";
                            $query = mysqli_query($conn, $sql);
                            
                            while ($data = mysqli_fetch_assoc($query)) {
                                echo
                                 "
                                    <tr class='hover:bg-green-300 font-semibold hover:text-blue-900 text-blue-700'>
                                       <td class='px-4 py-2 border-blue-700 border-b'>{$data['Trainee_Id']}</td>
                                       <td class='px-4 py-2 border-blue-700 border-b'>{$data['Firstname']}</td>
                                       <td class='px-4 py-2 border-blue-700 border-b'>{$data['lastname']}</td>
                                       <td class='px-4 py-2 border-blue-700 border-b'>{$data['Gender']}</td>
                                       <td class='px-9 py-2 border-blue-700 border-b'>{$data['Trade_Id']}</td>
                                       <td class='px-4 py-2 border-blue-700 border-b'>{$data['Trade_Name']}</td>
                                       <td class='px-4 py-2 border-blue-700 border-b hover:underline'><a href='updateTrainee.php?Trainee_Id={$data['Trainee_Id']}' class='text-green'>Update</a></td>
                                       <td class='px-4 py-2 border-blue-700 border-b text-red-500 hover:underline'><a href='deleteTrainee.php?Trainee_Id={$data['Trainee_Id']}'>Delete</a></td>
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
