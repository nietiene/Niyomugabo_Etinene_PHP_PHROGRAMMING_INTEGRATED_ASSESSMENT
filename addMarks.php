<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trainee Code</label>
        <input type="text" name="Trainee_Id" id=""> <br>
        <label for="">Module Name</label>
        <select name="Module_Id" id="">
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
       echo "Trainee Code" . $trainee_code . " <br>module_code" . $module_code . "<br>Fromative" . $Formative . "<br>Summative".$Summative;
        $Total = $Formative + $Summative;
        $Decision = ($Total >= 70) ? "Competent" : "Not Competent";

        $sql = "INSERT INTO marks(Trainee_Id, Module_Id, Formative_Assessment, Summative_Assessment, Total_Marks) VALUES('$trainee_code', '$module_code', '$Formative', '$Summative', '$Total')";
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