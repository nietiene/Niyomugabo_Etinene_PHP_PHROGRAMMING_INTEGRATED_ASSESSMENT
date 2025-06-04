
  <?php
      include("conn.php");
   session_start();

    if (!isset($_SESSION['Usename'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }
      
      $error = "";
      if (isset($_POST['addMarks'])) {
        
        if (!empty($_POST['Trainee_Id']) && !empty($_POST['Module_Id']) && !empty($_POST['Formative_Assessment']) && !empty($_POST['Summative_Assessment'])) {
            
               $trainee_code = $_POST['Trainee_Id'];
               $module_code = $_POST['Module_Id'];
               $Formative = $_POST['Formative_Assessment'];
               $Summative = $_POST['Summative_Assessment'];
               //echo "Trainee Code" . $trainee_code . " <br>module_code" . $module_code . "<br>Fromative" . $Formative . "<br>Summative".$Summative;

               $checkIdOfUser = "SELECT * FROM trainees WHERE Trainee_Id = '$trainee_code'";
               $sqlOfid = mysqli_query($conn, $checkIdOfUser);

               if (mysqli_num_rows($sqlOfid) > 0) {
                  
                if ($Formative <= 50 && $Summative <= 50) {

                     $Total = $Formative + $Summative;
                     $Decision = ($Total >= 70) ? "Competent" : "Not Competent";

                    $sql = "INSERT INTO marks(Trainee_Id, Module_Id, Formative_Assessment, Summative_Assessment, Total_Marks, decision) VALUES('$trainee_code', '$module_code', '$Formative', '$Summative', '$Total', '$Decision    ')";
                    $query = mysqli_query($conn, $sql);
        
                   if ($query) {
                      header("Location:listOfMarks.php");
                  } else {
                     die("ERROR:". mysqli_error($conn));
             } 
         } else {
                $error = "Marks Must be less than or equal to 50";
    }
       }   else {
              $error = "Code of trainee not found";
       }
   } else {
              $error = "Please fill  out the empty space!!";
      }
      }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link href="output.css" rel="stylesheet">
</head>
<body class="min-h-screen flex justify-center items-center bg-blue-300">
    <?php include("Dashboard.php"); ?>
    <form method="post" class="max-w-md w-full bg-green-400 p-9 rounded-lg shadow-2xl">
        <h1 class="text-lg text-center underline text-blue-700 font-bold mb-6">Add Marks</h1>
        <label class="text-md text-blue-700 font-bold block">Trainee Code</label>
        <input type="text" name="Trainee_Id" 
        class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400"/> <br>
        <label class="text-md text-blue-700 font-bold block">Module Name</label>
        <select name="Module_Id"  class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400">
            <option value="">Select Module</option>
            <?php
               include('conn.php');
               $sql = "SELECT * FROM modules";
               $query = mysqli_query($conn, $sql);
               while ($data = mysqli_fetch_assoc($query)) {
                echo "<option value='" . $data['Module_Id'] . "'>" . $data['Module_Name'] . "</option>";
               }
            ?>
        </select> <br>
        <label  class="text-md text-blue-700 font-bold block">Formative Assessment Makarks/50</label>
        <input type="number" name="Formative_Assessment" 
         class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400"> <br>

        <label  class="text-md text-blue-700 font-bold block">Summative Assessment Makarks/50</label>
        <input type="number" name="Summative_Assessment" 
         class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-500 focus:ring-2 focus:outline-green-400 mb-4"> <br>
         
         <div class="flex justify-between mb-4">
             <button name="addMarks" class="bg-blue-500 py-2 px-5 text-white rounded-lg shadow-xl hover:bg-blue-600 transition duration-200">Save Marks</button>
             <a href="Dashboard.php" class="bg-red-500 py-2 px-5 text-white rounded-lg shadow-xl hover:bg-red-600 transition duration-200">Back</a>
        </div>
          <?php if (!empty($error)): ?>
                <div class="py-1 text-red-500 px-1">
                    <?php echo $error; ?>
                </div>
             <?php endif; ?>   
    </form>

  
</body>
</html>