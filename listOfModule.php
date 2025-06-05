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
</head>
<body class="min-h-screen bg-green-100  flex flex-col">
 <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white">
    <?php include("Dashboard.php"); ?>
</header>
<main class="flex-grow pt-20 px-4 flex p-9">
    <div class="bg-blue-300 p-8 px-10 py-10 shadow-2xl rounded-md ">
        <h1 class="text-2xl text-center text-green-600 font-semibold shadow-lg mb-4">List Of Modules</h1>
    <div class="flex justify-between">
       <a href="addModule.php" class="mb-7 bg-green-500 py-2 px-5 text-white rounded-lg hover:bg-green-700">Add New Module</a>
       <a href="greetingUser.php" class="mb-7 bg-red-500 py-2 px-5 text-white rounded-lg hover:bg-red-700">Back</a>
    </div>
    <div class="overflow-x-auto rounded-sm">
    <table border="2" cellspacing="2" cellpadding="5"
    class="border border-blue-600 text-sm">
        <tr class="bg-green-500 text-blue-700">
          <th class="px-10 py-3 border-b border-blue-500">Module Code</th>
          <th class="px-10 border-b border-blue-500">Module Name</th>
          <th class="px-10 border-b border-blue-500">Trade Code</th>
          <th class="px-10 border-b border-blue-500">Trade Name</th>
          <th colspan="2" class="px-10 border-b border-blue-500">Modification</th>
        </tr>

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
                    echo 
                      "
                      <tr class='text-blue-900 hover:bg-green-500'>
                          <td class='px-10 py-3 border-b border-blue-500'>{$data['Module_Id']}</td>
                          <td class='px-10 py-3 border-b border-blue-500'>{$data['Module_Name']}</td>
                          <td class='px-10 py-3 border-b border-blue-500'>{$data['Trade_Id']}</td>
                          <td class='px-10 py-3  border-b border-blue-500'>{$data['Trade_name']}</td>
                          <td class='px-10 py-3 border-b border-blue-500 hover:underline'><a href='updateModule.php?Module_Id={$data['Module_Id']}'>Update</a></td>
                          <td class='px-10 py-3 border-b border-blue-500 text-red-500 hover:underline'><a href='deleteModule.php?Module_Id={$data['Module_Id']}'>Delete</a></td>
                      </tr>
                      ";
                } 
            }else {
                    echo "No data Found!!!!!";
            }
       ?>
    </table>
    </div>
    </div>
</body>
</html>