<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trainee Code</label>
        <input type="text" name="Trade_Id" id=""> <br>
        <label for="">Module Name</label>
        <select name="moduleId" id="">
            <?php
               include('conn.php');
               $sql = "SELECT * FROM modules";
               $query = mysqli_query($conn, $sql);
               while ($data = mysqli_fetch_assoc($query)) {
                echo "'<option value=" . $data['moduleId'] . "'>" . $data['Module_Name'] . "</option>";
               }
            ?>
        </select> <br>
        <label for="">Formative Assessment Makarks/50</label>
        <input type="text" name="Formative_Assessment" id=""> <br>

        <label for="">Summative Assessment Makarks/50</label>
        <input type="text" name="Summative_Assessment" id=""> <br>

        <button name="addMarks">Save Marks</button>
    </form>

    <?php
      include("conn.php");

      if (isset($_POST['addMarks'])) {
        
      }


    ?>
</body>
</html>