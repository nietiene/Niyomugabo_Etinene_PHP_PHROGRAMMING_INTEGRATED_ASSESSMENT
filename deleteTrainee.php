<?php
   include("conn.php");
   session_start();

    if (!isset($_SESSION['Usename'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }

?>
<?php
   include ("conn.php");
   
   $Trainee_Id = $_GET['Trainee_Id'];
   
   $delete_In_Marks_Table = mysqli_query($conn, "DELETE FROM marks WHERE Trainee_Id = '$Trainee_Id'");
   $sql = "DELETE FROM trainees WHERE Trainee_Id = '$Trainee_Id'";
   $result = mysqli_query($conn, $sql);
   
   if ($result && $delete_In_Marks_Table) {
    echo "Trainee Deleted";
    header("Location:listOfTrainee.php");   
} else {
    die("ERROR:". mysqli_error($conn));
}

?>