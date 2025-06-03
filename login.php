  <?php
       include ('conn.php');
       session_start();
       if (isset($_POST['login'])) {
            $username = $_POST['Usename'];
            $password = $_POST['Password'];

            $error = "";
            $sql = "SELECT * FROM users WHERE Usename='$username' AND Password='$password'";
            $data = mysqli_query($conn, $sql);
            
            if (!$data) {
                echo "ERROR". mysqli_error($conn);
            }
            if (mysqli_num_rows($data) > 0) {
                $_SESSION['Usename'] = $username;
                header('Location:dashboard.php');
            } else {
               $error = "Invalid Credentials";
            }
       }

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-blue-200 flex justify-center items-center">
    <form action="" method="post" class="max-w-md w-full bg-green-400 p-8 shadow-2xl rounded-xl">
        <h1 class="text-blue font-bold underline text-center text-blue-600 text-xl mb-6">Login Page</h1>
        <label class="font-bold text-blue-500 text-lg">Username</label>
        <input type="text" name="Usename" 
        class="w-[76%] py-3 rounded-lg bg-green-200 shadow-lg focus:ring-2 focus:outline-green-400 mb-6 text-green-500"> <br>
        <label  class="font-bold text-blue-500 text-lg">Password</label>
        <input type="password" name="Password" 
        class="w-[76%] py-3 rounded-lg bg-green-200 shadow-lg focus:ring-2 focus:outline-green-400 me-2 text-green-500 mb-6"> <br>

        <button name="login" class="bg-blue-400 w-[50%] py-3 text-white rounded-lg hover:bg-blue-500 shadow-2xl">Login</button>

        <?php
        
        
        
        ?>
    </form>
</body>
</html>