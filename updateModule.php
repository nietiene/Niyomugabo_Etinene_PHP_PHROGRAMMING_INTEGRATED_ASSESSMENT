<?php
     include("conn.php");
     
     if (isset($_GET['Module_Id'])) {
        $Module_Id = $_GET['Module_Id'];   
        $sql = "SELECT * FROM modules WHERE Module_Id = '$Module_Id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $Module = mysqli_fetch_assoc($result);
        } else {
            echo "No Module Found To Update";
        }
     }
     

?>