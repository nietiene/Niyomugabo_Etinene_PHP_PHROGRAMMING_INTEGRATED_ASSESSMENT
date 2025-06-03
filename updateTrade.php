<?php
 
     include ("conn.php");
     if (isset($_GET['Trade_id'])) {
          $Trade_Id = $_GET['Trade_id'];
          $sql = "SELECT * FROM trades WHERE Trade_id = $Trade_Id";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            $Data = mysqli_fetch_assoc($result);
          } else {
            die("ERROR:" . mysqli_error($conn));
          }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trade</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trade Code</label>
        <input type="text" name="Trade_id" value=<?php echo $Data['Trade_id']?>> <br>

        <label for="">Trade Name</label>
        <input type="text" name="Trade_Name" value=<?php echo $Data['Trade_name']?>> <br>
      
        <button name="save">Save Changes</button>
    </form>
</body>
</html>