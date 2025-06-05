<?php
    include("conn.php");
    
    session_start();
    if (isset($_POST['login'])) {
       
        $Trainee_id = $_POST['Trainee_Id'];
        $Firstname = $_POST['Firstname'];
        $lastname = $_POST['lastname'];

        $sql = "SELECT * FROM trainees WHERE Trainee_Id = '$Trainee_id' AND Firstname = '$Firstname' AND lastname = '$lastname'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            die ("ERROR:" . mysqli_error($conn));
        }
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
             $_SESSION['Firstname'] = $Firstname;
             $_SESSION['Trainee_Id'] = $Trainee_id;
             header("Location:userPage.php");
             exit();
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