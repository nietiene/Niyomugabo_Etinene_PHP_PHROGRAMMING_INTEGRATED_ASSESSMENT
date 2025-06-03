<?php

   include('conn.php');
   
   if (isset($_GET['Marks_Id'])) {
       $Marks_Id = $_GET['Mark_id'];
       $sql = "SELECT * FROM marks WHERE Mark_Id = '$Marks_Id'";
       $result = mysqli_query($conn, $sql);
     
       if (mysqli_num_rows($result) > 0 ) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo "User Not Found";
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Marks Table</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Mark Code</label>
        <input type="text" name="Mark_Id" value=<?php echo $data['Mark_Id'];?>>
    </form>
</body>
</html>