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
  <title>Competent List</title>
  <link href="output.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-green-100 flex flex-col">


<header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white h-16 flex items-center px-4">
  <?php include("Dashboard.php"); ?>
</header>

<main class="flex-grow pt-24 px-4 flex justify-center items-start">
  <div class="bg-blue-300 p-8 shadow-2xl rounded-md w-full max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-semibold text-green-700 underline text-center flex-grow">Competent Trainees List</h1>
      <a href="greetingUser.php" class="bg-red-500 px-6 py-2 text-white rounded-lg hover:bg-red-700 transition duration-300 ml-6">Back</a>
    </div>

    <div class="overflow-x-auto rounded-md">
      <div class="flex justify-end mb-4">
  <a href="download_competent.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800 transition">
    Download List
  </a>
</div>

      <table class="min-w-full border border-blue-600 rounded-lg text-sm">
        <thead class="bg-green-500 text-blue-700 font-semibold">
          <tr>
            <th class="px-6 py-3 border-b border-blue-500">Trainee Code</th>
            <th class="px-6 py-3 border-b border-blue-500">Trainee Name</th>
            <th class="px-6 py-3 border-b border-blue-500">Module Code</th>
            <th class="px-6 py-3 border-b border-blue-500">Module Name</th>
            <th class="px-6 py-3 border-b border-blue-500">Decision</th>
          </tr>
        </thead>
        <tbody class="font-semibold text-green-700">
          <?php
              $sql = "SELECT m.Trainee_Id , 
                       CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
                       m.Module_Id,
                       md.Module_Name,
                       m.decision,
                       m.Total_Marks
                       FROM marks m 
                       JOIN Trainees t ON t.Trainee_Id = m.Trainee_Id
                       JOIN modules md ON m.Module_Id = md.Module_Id
                       HAVING m.Total_Marks >= 70";

              $query = mysqli_query($conn, $sql);

              if (mysqli_num_rows($query) > 0) {
                  while($data = mysqli_fetch_assoc($query)) {
                      echo "
                       <tr class='hover:bg-green-200 text-blue-900'>
                         <td class='px-6 py-3 border-b border-blue-500'>{$data['Trainee_Id']}</td>
                         <td class='px-6 py-3 border-b border-blue-500'>{$data['Trainee_Name']}</td>
                         <td class='px-6 py-3 border-b border-blue-500'>{$data['Module_Id']}</td>
                         <td class='px-6 py-3 border-b border-blue-500'>{$data['Module_Name']}</td>
                         <td class='px-6 py-3 border-b border-blue-500 text-green-900'>{$data['decision']}</td>
                       </tr>
                      ";
                  }
              } else {
                  echo "<tr><td colspan='5' class='text-center py-4 text-red-600 font-semibold'>No competent trainees found!</td></tr>";
              }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

</body>
</html>
