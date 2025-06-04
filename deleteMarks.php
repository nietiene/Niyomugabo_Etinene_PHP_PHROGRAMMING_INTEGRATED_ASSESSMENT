<?php
   include("conn.php");
   session_start();

    if (!isset($_SESSION['usename'])) {
       header("Location:login.php");
   }

?>
<?php
    include ('conn.php');

     $Mark_Id = $_GET['Mark_Id'];
     $sql = "DELETE FROM marks WHERE Mark_Id = '$Mark_Id'";
     $query = mysqli_query($conn, $sql);
    if ($query) {
        header("Location:listOfMarks.php");
    } else {
        die("ERROR:" . mysqli_error($conn));
    }

?>