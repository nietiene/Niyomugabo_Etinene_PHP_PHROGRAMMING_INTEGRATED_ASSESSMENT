<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Username</label>
        <input type="text" name="Usename" > <br>
        <label for="">Passowrd</label>
        <input type="text" name="Password" > <br>

        <button name="login">Login</button>
    </form>

    <?php
        include ('conn.php');
       if (isset($_POST['login'])) {
            $username = $_POST['Usename'];
            $password = $_POST['Password'];

            $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['Usename'] = $username;
                header('Location:dashboard.php');
            } else {
                echo "Invalid Credetnials";
            }
       }

   ?>
</body>
</html>