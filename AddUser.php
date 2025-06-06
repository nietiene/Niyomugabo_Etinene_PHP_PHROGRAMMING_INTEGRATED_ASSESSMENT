<?php
include("conn.php");

// this is variable for success
$success = $error = "";

if (isset($_POST['add_user'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            $success = "User added successfully!";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Both fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add User</title>
  <link href="output.css" rel="stylesheet">
</head>
<body class="bg-green-100 flex justify-center items-center min-h-screen">

  <form action="" method="POST" class="bg-blue-300 p-8 rounded-xl shadow-xl w-full max-w-md">
    <h2 class="text-xl text-blue-800 font-bold text-center mb-6">Add New User</h2>

    <?php if ($success): ?>
      <div class="bg-green-200 text-green-800 text-center rounded p-2 mb-4"><?= $success ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
      <div class="bg-red-200 text-red-800 text-center rounded p-2 mb-4"><?= $error ?></div>
    <?php endif; ?>

    <label class="block text-blue-700 font-semibold mb-1">Username:</label>
    <input type="text" name="username" class="w-full p-2 mb-4 rounded shadow focus:ring focus:outline-none">

    <label class="block text-blue-700 font-semibold mb-1">Password:</label>
    <input type="password" name="password" class="w-full p-2 mb-6 rounded shadow focus:ring focus:outline-none">

    <button type="submit" name="add_user" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800 w-full">Add User</button>
  </form>


  
</body>
</html>
