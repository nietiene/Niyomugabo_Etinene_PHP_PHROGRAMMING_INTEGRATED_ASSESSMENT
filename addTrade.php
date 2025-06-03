<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trade</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trade Name</label>
        <input type="text" name="Trade_name" > <br>

        <button name="add">Add New</button>
    </form>

    <?php
          include("conn.php");

          if (isset($_POST['add'])) {
           
            $Trade_Name = $_POST['Trade_name'];
            $sql = "INSERT INTO trades(Trade_name) VALUES('$Trade_Name')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                header("Location:listOfTrades.php");
            } else {
                die("ERROR:" . mysqli_error($conn));
            }

          }
    ?>
</body>
</html>