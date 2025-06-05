<?php
    include("conn.php");

    if (isset($_POST['login'])) {
       
        $Trainee_id = $_POST['Trainee_Id'];
        $Firstname = $_POST['Firstname'];
        $lastname = $_POST['lastname'];

        $sql = "SELECT * FROM trainees WHERE Trainee_Id = '$Trainee_id', Firstname = '$Firstname', lastname = '$lastname'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            $Firstname = $_SESSION['Firstname'];
            header("userPage.php");
        } else {
            echo "Invalid data";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trainee Code</label>
        <input type="text" name="Trainee_Id" /> <br>
        <label for="">First Name</label>
        <input type="text" name="Firstname" /> <br>
        <label for="">Last Name</label>
        <input type="text" name="lastname" /> <br>

        <button name="login">Login</button>
    </form>
</body>
</html>