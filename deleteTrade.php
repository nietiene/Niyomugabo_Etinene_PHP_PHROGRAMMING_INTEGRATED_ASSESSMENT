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
     
     $Trade_Id = $_GET['Trade_id'];
     $sql = "DELETE FROM trades WHERE Trade_id = '$Trade_Id'";
     $result = mysqli_query($conn, $sql);

     if ($result) {
        header("Location:listOfTrades.php");
     } else {
        die ("ERROR". mysqli_error($conn));
     }

?>