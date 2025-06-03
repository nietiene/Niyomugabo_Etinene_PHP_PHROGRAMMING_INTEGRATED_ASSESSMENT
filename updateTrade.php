<?php
 
     include ("conn.php");
     if (isset($_GET['Trade_Id'])) {
          $Trade_Id = $_GET['Trade_Id'];
          $sql = "SELECT * FROM trades WHERE Trade_Id = $Trade_Id";
          $result = mysqli_query($sql);
          
          if (mysqli_num_rows($result)) {
            $Data = mysqli_fetch_assoc($result);
          } else {
            die("ERROR:" . mysqli_error($conn));
          }
        
    }

?>