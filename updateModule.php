<?php
     include("conn.php");
     
     if (isset($_GET['Module_Id'])) {
        $Module_Id = $_GET['Module_Id'];   
        $sql = "SELECT
              m.Module_Id,
              m.Module_Name,
              m.Trade_Id,
              t.Trade_name
              FROM modules m 
              JOIN trades t
              ON t.Trade_id = m.Trade_Id WHERE Module_Id = '$Module_Id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $Module = mysqli_fetch_assoc($result);
        } else {
            echo "No Module Found To Update";
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Module <?php echo $Module['Module_Name'];?></title>
</head>
<body>
    <h1>Update Module <?php echo $Module['Module_Name']?></h1>
    <form action="" method="post">
        <label for="">Module Code</label>
        <input type="text" name="Module_Id" value="<?php echo $Module['Module_Id']?>"> <br>

        <label for="">Module Name</label>
        <input type="text" name="Module_Id" value="<?php echo $Module['Module_Name']?>"> <br>

        <label for="">Trade Code</label>
        <input type="text" name="Module_Id" value="<?php echo $Module['Trade_Id']?>" readonly> <br>

        <label for="">Trade Name</label>
       <select name="Trade_Id" >
          <?php
            echo "<option value='<?php echo $Module['Trade_Id']?> '>"
           ?>
       </select>
    </form>
</body>
</html>