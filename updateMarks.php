<?php
   include('conn.php');
   session_start();

   if (!isset($_SESSION['Usename'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }   
   if (isset($_GET['Mark_Id'])) {
       $Mark_Id = $_GET['Mark_Id'];
       $sql = "SELECT * FROM marks WHERE Mark_Id = '$Mark_Id'";
       $result = mysqli_query($conn, $sql);
     
       if (mysqli_num_rows($result) > 0 ) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo "User Not Found";
        }
   }

   $error = "";     
   if (isset($_POST['save'])) {
      if (!empty($_POST['Mark_Id']) && !empty($_POST['Trainee_Id']) && !empty($_POST['Module_Id']) && !empty($_POST['Formative_Assessment']) && !empty($_POST['Summative_Assessment'])) {
          $Mark_Id = $_POST['Mark_Id'];
          $trainee_code = $_POST['Trainee_Id'];
          $Module_Id = $_POST['Module_Id'];
          $Formative = $_POST['Formative_Assessment'];
          $Summative = $_POST['Summative_Assessment'];

          $Total = $Formative + $Summative;
          $Decision = ($Total) >= 70 ? "Competent" : "Not Competent";

          $sql = "UPDATE marks SET 
                 Mark_Id = '$Mark_Id',
                 Trainee_Id = '$trainee_code',
                 Module_Id = '$Module_Id',
                 Formative_Assessment = '$Formative',
                 Summative_Assessment = '$Summative',
                 Total_Marks = '$Total',
                 decision = '$Decision'
                 WHERE Mark_Id = '$Mark_Id'
          ";
          $query = mysqli_query($conn, $sql);

          if ($query) {
            header("Location:listOfMarks.php");
          } else {
            die("ERROR:" . mysqli_error($conn));
          }
      } else {
          $error = "Please fill out empty space";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Marks Table</title>
    <link href="output.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-blue-300 flex flex-col">

  <!-- Nav aligned to top -->
  <div class="w-full">
    <?php include("Dashboard.php"); ?>
  </div>

  <!-- Main content: form centered vertically and horizontally -->
  <main class="flex-grow flex justify-center items-center p-9">
    <form method="post" class="max-w-md w-full bg-green-400 p-9 rounded-lg shadow-2xl">
      
        <label class="text-md text-blue-700 font-bold block">Mark Code</label>
        <input type="text" name="Mark_Id" value="<?php echo $data['Mark_Id']; ?>"
         class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400" readonly> <br>

        <label class="text-md text-blue-700 font-bold block">Trainee Code</label>
        <input type="text" name="Trainee_Id" value="<?php echo $data['Trainee_Id']; ?>"
         class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400"> <br>

        <label class="text-md text-blue-700 font-bold block">Module Code</label>
        <input type="text" name="Module_Id" value="<?php echo $data['Module_Id']; ?>"
        class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400"> <br>

        <label class="text-md text-blue-700 font-bold block">Formative Assessment /50</label>
        <input type="text" name="Formative_Assessment" value="<?php echo $data['Formative_Assessment']; ?>"
        class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400"> <br>

        <label class="text-md text-blue-700 font-bold block">Summative Assessment /50</label>
        <input type="text" name="Summative_Assessment" value="<?php echo $data['Summative_Assessment']; ?>"
        class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400 mb-4"> <br>

        <div class="flex justify-between mb-4">
             <button name="save" class="bg-blue-500 py-2 px-5 text-white rounded-lg shadow-xl hover:bg-blue-600 transition duration-200">Save Marks</button>
             <a href="listOfMarks.php" class="bg-red-500 py-2 px-5 text-white rounded-lg shadow-xl hover:bg-red-600 transition duration-200">Back</a>
        </div>
      
       <?php if (!empty($error)): ?>
          <div class="py-1 text-red-500 px-1">
              <?php echo $error; ?>
          </div>
       <?php endif; ?>   
    </form>
  </main>

</body>
</html>
