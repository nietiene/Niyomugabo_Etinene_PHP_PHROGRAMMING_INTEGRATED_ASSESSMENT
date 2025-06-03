<?php
     include ('conn.php');
    
     if (isset($_GET['Trainee_Id'])) {
         $Trainee_Id = $_GET['Trainee_Id'];
      
         $sql = "SELECT t.Trainee_Name,
                 t.Firstname t.lastname,
                 t.Gender,
                  t.Trade_Id,
                  td.Trade_Name
                  FROM trainees t 
                  JOIN trades td
                  ON t.Trade_Id = td.Trade.Id";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
           $trainee = mysqli_fetch_assoc($query);       
        } else {
            die ("ERROR:" . mysqli_error($conn));
        }
        
      
     }



?>