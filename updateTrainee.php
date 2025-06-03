<?php
     include ('conn.php');
    
     if (isset($_GET['Trainee_Id'])) {
         $Trainee_Id = $_GET['Trainee_Id'];
      
         $sql = "SELECT t.Trainee_Id,
                  t.Firstname,
                  t.lastname,
                  t.Gender,
                  t.Trade_Id,
                  td.Trade_Name
                  FROM trainees t 
                  JOIN trades td
                  ON t.Trade_Id = td.Trade_Id WHERE t.Trainee_Id = '$Trainee_Id'";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
           $trainee = mysqli_fetch_assoc($query);       
        } else {
            die ("ERROR:" . mysqli_error($conn));
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update <?php echo $trainee['Firstname']; ?></title>
</head>
<body>
    <h1>Update <?php echo $trainee['Firstname']?></h1>
    <form action="" method="post">
        <label for="">Trainee Code</label>
        <input type="text" name="Trainee_Id" value=<?php echo $trainee['Trainee_Id'];?> readonly> <br>
     
        <label for="">First Name</label>
        <input type="text" name="Firstname" value=<?php echo $trainee['Firstname'];?>> <br>

        <label for="">Last Name</label>
        <input type="text" name="lastname" value=<?php echo $trainee['lastname'];?>> <br>

        <label for="">Gender</label>
        <input type="text" name="Gender" value=<?php echo $trainee['Gender'];?>> <br>

        <label for="">Trade Code</label>
        <input type="text" name="Trade_Id" value=<?php echo $trainee['Trade_Id'];?> readonly> <br>

        <label for="">Trade Name</label>
        <input type="text" name="Trade_Name" value=<?php echo $trainee['Trade_Name'];?>> <br>

        <button name="update">Save Changes</button>
 </form>

 <?php
    
    if (isset($_POST['update'])) {
        $FirstName = $_POST['Firstname'];
        $lastname = $_POST['lastname'];
        $Gender = $_POST['Gender'];
        $Trade_Name = $_POST['Trade_Name'];
        $Trade_Id = $_POST['Trade_Id'];

        $sql = "UPDATE trainees  SET 
        Firstname='$FirstName',
        lastname='$lastname',
        Gender='$Gender'
        
        WHERE Trainee_Id = $Trainee_Id;
        ";
        $sql_Of_Trade = "UPDATE trades SET Trade_Name='$Trade_Name' WHERE Trade_Id = '$Trade_Id'"; 
        
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql_Of_Trade);

        if ($result && $result2) {
            echo "Trainee Updated Successfully";
            header("Location:listOfTrainee.php");
        } else {
            die ("ERROR:" .mysqli_error($conn));
        }
    }




  ?>
</body>
</html>