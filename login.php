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
       session_start();
       if (isset($_POST['login'])) {
            $username = $_POST['Usename'];
            $password = $_POST['Password'];

            $sql = "SELECT * FROM users WHERE Usename='$username' AND Password='$password'";
            $data = mysqli_query($conn, $sql);
            
            if (!$data) {
                echo "ERROR". mysqli_error($conn);
            }
            if (mysqli_num_rows($data) > 0) {
                $_SESSION['Usename'] = $username;
                header('Location:dashboard.php');
            } else {
                echo "Invalid Credetnials";
            }
       }

   ?>
</body>
</html>