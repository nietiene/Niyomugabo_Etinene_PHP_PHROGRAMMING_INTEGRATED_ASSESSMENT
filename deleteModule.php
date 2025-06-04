<?php
   include("conn.php");
   session_start();

    if (!isset($_SESSION['usename'])) {
       header("Location:login.php");
   }

?>
<?php
    include("conn.php");
    $Module_Id = $_GET['Module_Id'];
    $sql = "DELETE FROM modules WHERE Module_Id = '$Module_Id'";
    $result = mysqli_query($conn, $sql);
    
   if ($result) {
    header("Location:listOfModule.php");
   } else {
    die("ERROR:" . mysqli_error($conn));
   }
?>