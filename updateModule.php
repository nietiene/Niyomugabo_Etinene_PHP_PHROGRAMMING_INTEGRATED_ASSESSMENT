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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-blue-100 flex justify-center items-center">
    <form action="" method="post" class="bg-green-500 p-6 max-w-md w-[35%] rounded-lg shadow-2xl">
        <h1 class="text-lg text-center text-blue-600 font-bold underline">Update Module <?php echo $Module['Module_Name']?></h1>

        <label class="block text-lg text-blue-600 font-bold">Module Code</label>
        <input type="text" name="Module_Id" value="<?php echo $Module['Module_Id']?>" readonly
        class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300"> <br>

        <label class="block text-lg text-blue-600 font-bold">Module Name</label>
        <input type="text" name="Module_Name" value="<?php echo $Module['Module_Name']?>"
        class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300"> <br>

        <label class="block text-lg text-blue-600 font-bold">Trade Code</label>
        <input type="text" name="Trade_Id" value="<?php echo $Module['Trade_Id']?>" readonly
        class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300"> <br>

        <label class="block text-lg text-blue-600 font-bold">Trade Name</label>
       <select name="Trade_Id" class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300">
          <?php
          $sql = "SELECT * FROM trades";
          $query = mysqli_query($conn, $sql);
          while($data = mysqli_fetch_assoc($query)) {
            echo "<option value='" . $data['Trade_id'] . "'>" . $data['Trade_name'] . "</option>";
          } 
          ?>
       </select> <br>
 
    <button name="save">Save Changes</button>
    </form>

    <?php
    
       if (isset($_POST['save'])) {
           $Module_Id = $_POST['Module_Id'];
           $Module_Name = $_POST['Module_Name'];
           $Trade_Id = $_POST['Trade_Id'];

           $sql = "UPDATE modules SET Module_Name = '$Module_Name', Trade_Id = '$Trade_Id' WHERE Module_Id = '$Module_Id'";
           $query = mysqli_query($conn, $sql);

           if ($query) {
            header("Location:listOfModule.php");
           } else {
            die("ERROR:" . mysqli_error($conn));
           }
       }


    ?>
</body>
</html>