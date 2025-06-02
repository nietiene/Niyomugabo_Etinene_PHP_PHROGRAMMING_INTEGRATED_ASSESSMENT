<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Module</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Module Name</label>
        <input type="text" name="Module_Name" /> <br>
        <select name="Trade_Id" >
            <?php
               include("conn.php");
               $sql = "SELECT * FROM trades";
               $query = mysqli_query($conn, $sql);
               while ($data = mysqli_fetch_assoc($query)) {
                echo "<option value='" . $data['Trade_id'] . "'>" . $data['Trade_name'] . "</option>";
               }
            ?>
        </select>

        <button name="addModule">Save Module</button>
    </form>

    <?php
       include("conn.php");
       if (isset($_POST['addModule']))
    
    
    
    
    ?>
</body>
</html>