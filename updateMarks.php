<?php

   include('conn.php');
   
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Marks Table</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Mark Code</label>
        <input type="text" name="Mark_Id" value=<?php echo $data['Mark_Id'];?>> <br>
        <label for="">Trainee Code</label>
        <input type="text" name="Trainee_Id" value=<?php echo $data['Trainee_Id'];?>> <br>
        <label for="">Module Code</label>
        <input type="text" name="Module_Id" value=<?php echo $data['Module_Id'];?>> <br>
        <label for="">Formative Assessment</label>
        <input type="text" name="Formative_Assessment" value=<?php echo $data['Formative_Assessment'];?>> <br>
        <label for="">Summative Assessment</label>
        <input type="text" name="Summative_Assessment" value=<?php echo $data['Summative_Assessment'];?>> <br>

        <button name="save">Save Changes</button>
    </form>

    <?php
     
     if (isset($_POST['save'])) {
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
     }


    ?>
</body>
</html>