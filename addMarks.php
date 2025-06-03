<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-center">
    <form action="" method="post" class="max-w-md w-full bg-green-400 p-9 rounded-lg shadow-2xl">
        <h1 class="text-lg text-center text-blue-700 font-bold">Add Marks</h1>
        <label for="">Trainee Code</label>
        <input type="text" name="Trainee_Id" id=""> <br>
        <label for="">Module Name</label>
        <select name="Module_Id" id="">
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
        <label>Formative Assessment Makarks/50</label>
        <input type="text" name="Formative_Assessment" > <br>

        <label>Summative Assessment Makarks/50</label>
        <input type="text" name="Summative_Assessment" > <br>

        <button name="addMarks">Save Marks</button>
    </form>

    <?php

      if (isset($_POST['addMarks'])) {
        
        $trainee_code = $_POST['Trainee_Id'];
        $module_code = $_POST['Module_Id'];
        $Formative = $_POST['Formative_Assessment'];
        $Summative = $_POST['Summative_Assessment'];
       //echo "Trainee Code" . $trainee_code . " <br>module_code" . $module_code . "<br>Fromative" . $Formative . "<br>Summative".$Summative;
        $Total = $Formative + $Summative;
        $Decision = ($Total >= 70) ? "Competent" : "Not Competent";

        $sql = "INSERT INTO marks(Trainee_Id, Module_Id, Formative_Assessment, Summative_Assessment, Total_Marks, decision) VALUES('$trainee_code', '$module_code', '$Formative', '$Summative', '$Total', '$Decision    ')";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
            echo "Data Inseted Successfully <br><strong>$Decision</strong>";
        } else {
            die("ERROR:". mysqli_error($conn));
        }
      }


    ?>
</body>
</html>