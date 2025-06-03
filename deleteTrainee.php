<?php
   include ("conn.php");
   
   $Trainee_Id = $_GET['Trainee_Id'];
   $sql = "DELETE FROM trainees WHERE Trainee_Id = '$Trainee_Id'";
   $result = mysqli_query($conn, $sql);
   
   if ($result) {
    echo "Trainee Deleted";
    header("Location:listOfTrainee.php");   
} else {
    die("ERROR:". mysqli_error($conn));
}

?>