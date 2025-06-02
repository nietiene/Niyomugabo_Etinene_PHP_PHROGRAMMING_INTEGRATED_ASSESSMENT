<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Trainee</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Firstname</label>
        <input type="text" name="Firstname" > <br>

        <label for="">Last Name</label>
        <input type="text" name="latname" > <br>

        <label for="">Gender</label>
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select> <br>
        <label >Trade Id</label>
        <input type="text" name="Trade_id" /> <br>

        <button name="add">Save</button>
    </form>

    <?php
        include("conn.php");
       
        if (isset($_POST['add'])) {
            $firstName = $_POST['Firstname'];
            $lastName = $_POST['latname'];
            $gender = $_POST['gender'];
            $trade_id = $_POST['Trade_id'];

            $sql = "INSERT INTO trainees(firstName,latname,gender,Trade_id) VALUES('$firstName', '$lastName', $gender, $trade_id)";
            
        }



    ?>
</body>
</html>