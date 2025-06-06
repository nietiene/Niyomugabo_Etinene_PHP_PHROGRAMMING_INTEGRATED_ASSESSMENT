<?php
   include("conn.php");
   session_start();

    if (!isset($_SESSION['username'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }

?>
<?php
    include("conn.php");
    $Module_Id = $_GET['Module_Id'];
    $sql_Marks = "DELETE FROM marks WHERE Module_Id = '$Module_Id'";
    $query = mysqli_query($conn, $sql_Marks);
    
    $sql = "DELETE FROM modules WHERE Module_Id = '$Module_Id'";
    $result = mysqli_query($conn, $sql);
    
   if ($result) {
    header("Location:listOfModule.php");
   } else {
    die("ERROR:" . mysqli_error($conn));
   }
?>