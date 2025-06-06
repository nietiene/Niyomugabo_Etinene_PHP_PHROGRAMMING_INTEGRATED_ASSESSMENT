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
  <title>List Of Marks</title>
  <link href="output.css" rel="stylesheet" />
  <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="min-h-screen bg-green-100 flex flex-col ">

<header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white h-16 flex items-center px-4">
  <?php include("Dashboard.php"); ?>
</header>

<main class="flex-grow pt-24 px-4 flex justify-center">
  <div class="bg-blue-300 p-8 px-10 py-10 shadow-2xl rounded-md w-full max-w-7xl mx-auto">
    <div class="mb-6 flex justify-between space-x-6">
      <h1 class="text-2xl text-center text-green-600 font-semibold">List Of Marks</h1>
      
      <div class="flex justify-between space-x-4">
        <a href="addMarks.php" class="bg-green-500 py-2 px-5 text-white rounded-lg hover:bg-green-700 transition">Add Marks</a>
        <a href="greetingUser.php" class="bg-red-500 py-2 px-5 text-white rounded-lg hover:bg-red-700 transition">←Back</a>
      </div>
    </div>

    <div class="overflow-x-auto rounded-sm">
      <table class="border border-blue-600 text-sm w-full">
        <thead>
          <tr class="bg-green-500 text-blue-800">
            <th class="px-2 py-2 border-b border-blue-500">Mark Code</th>
            <th class="px-2 py-2 border-b border-blue-500">Trainee Code</th>
            <th class="px-2 py-2 border-b border-blue-500">Trainee Name</th>
            <th class="px-2 py-2 border-b border-blue-500">Module Code</th>
            <th class="px-2 py-2 border-b border-blue-500">Module Name</th>
            <th class="px-2 py-2 border-b border-blue-500">Formative /50</th>
            <th class="px-2 py-2 border-b border-blue-500">Summative /50</th>
            <th class="px-2 py-2 border-b border-blue-500">Total /100</th>
            <th class="px-2 py-2 border-b border-blue-500">Decision</th>
            <th colspan="2" class="px-6 py-3 border-b border-blue-500">Modification</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT 
                      m.Mark_Id, 
                      m.Trainee_Id, 
                      CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name, 
                      m.Module_Id, 
                      md.Module_Name,
                      m.Formative_Assessment,
                      m.Summative_Assessment,
                      m.Total_Marks,
                      m.Decision
                  FROM marks m
                  JOIN trainees t ON m.Trainee_Id = t.Trainee_Id 
                  JOIN modules md ON m.Module_Id = md.Module_Id
                  ORDER BY m.Trainee_Id ASC";

          $query = mysqli_query($conn, $sql);

          if (mysqli_num_rows($query) > 0) {
              while ($data = mysqli_fetch_assoc($query)) {
                  echo "
                  <tr class='text-blue-900 hover:bg-green-400 font-bold'>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Mark_Id']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Trainee_Id']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Trainee_Name']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Module_Id']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Module_Name']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Formative_Assessment']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Summative_Assessment']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Total_Marks']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500'>{$data['Decision']}</td>
                    <td class='px-3 py-2 border-b border-e border-blue-500 hover:underline'><a href='updateMarks.php?Mark_Id={$data['Mark_Id']}'>Update</a></td>
                    <td class='px-3 py-2 border-b border-e border-blue-500 text-red-500 hover:underline'><a href='deleteMarks.php?Mark_Id={$data['Mark_Id']}'>Delete</a></td>
                  </tr>
                  ";
              }
          } else {
              echo "<tr><td colspan='11' class='text-center py-4 text-red-600 font-semibold'>No data found!</td></tr>";
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

</body>
</html>
