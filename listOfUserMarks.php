<?php
   include("conn.php");
   session_start();

   if (!isset($_SESSION['Firstname'])) {
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
  <title>Student's Marks</title>
  <link href="output.css" rel="stylesheet" />
  <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="bg-green-100 min-h-screen flex flex-col">


  <header class="w-full fixed top-0 left-0 z-50 shadow-md bg-white">
    <?php include("userDashboard.php"); ?>
  </header>


  <main class="flex-grow pt-20 px-4 flex items-center justify-center">
    <div class="bg-blue-500 shadow-2xl rounded-xl p-6 w-full max-w-6xl min-h-[40vh] flex flex-col justify-between">

      <div class="flex justify-between mb-6 items-center">
        <h1 class="font-semibold text-2xl text-green-700">Student Marks </h1>

      </div>

      <div class="overflow-x-auto rounded-lg flex-grow">
        <table class="min-w-full text-sm border border-blue-500 shadow-lg">
          <thead class="bg-blue-700 text-green-400 text-center">
            <tr>
              <th class="px-4 py-3 ">Trainee Code</th>
              <th class="px-4 py-3 ">Trainee Name</th>
              <th class="px-4 py-3 ">Module Code</th>
              <th class="px-4 py-3 ">Module Name</th>
              <th class="px-4 py-3 ">Formative /50</th>
              <th class="px-4 py-3">Summative /50</th>
              <th class="px-4 py-3 ">Total</th>
              <th class="px-4 py-3 ">Decision</th>
            </tr>
          </thead>
          <tbody class="bg-green-500 text-center font-semibold text-blue-900">
            <?php
              if (isset($_GET['Trainee_Id'])) {
                $Trainee_Id = $_GET['Trainee_Id'];
                $sql = "SELECT t.Trainee_Id,
                        CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
                        m.Module_Id, md.Module_Name,
                        m.Formative_Assessment,
                        m.Summative_Assessment,
                        m.Total_Marks,
                        m.decision
                        FROM trainees t  
                        JOIN marks m ON t.Trainee_Id = m.Trainee_Id
                        JOIN modules md ON m.Module_Id = md.Module_Id
                        WHERE t.Trainee_Id = '$Trainee_Id'";
                $query = mysqli_query($conn, $sql);

                if (mysqli_num_rows($query)) {
                  while($data = mysqli_fetch_assoc($query)) {
                    echo "
                      <tr class='hover:bg-green-400 hover:text-blue-800 transition duration-150'>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Trainee_Id']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Trainee_Name']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Module_Id']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Module_Name']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Formative_Assessment']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Summative_Assessment']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b'>{$data['Total_Marks']}</td>
                        <td class='px-4 py-2 border-blue-700 border-b text-green-900 font-bold'>{$data['decision']}</td>
                      </tr>
                    ";
                  }
                } else {
                  echo "
                    <tr>
                      <td colspan='8' class='py-4 text-red-600 font-semibold text-center'>No results found for this trainee.</td>
                    </tr>
                  ";
                }
              }
            ?>
          </tbody>
        </table>
        <div class="flex mt-8">
            <a href="userPage.php" class="bg-green-500 px-4 py-2 rounded-lg hover:bg-green-700 text-white">Back to Dashboard</a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
