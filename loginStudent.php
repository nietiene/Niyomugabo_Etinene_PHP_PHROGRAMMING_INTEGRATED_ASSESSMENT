<?php
include("conn.php");
session_start();

$error = "";

if (isset($_POST['login'])) {
    $Trainee_id = $_POST['Trainee_Id'];
    $Firstname = $_POST['Firstname'];
    $lastname = $_POST['lastname'];

    $sql = "SELECT * FROM trainees WHERE Trainee_Id = '$Trainee_id' AND Firstname = '$Firstname' AND lastname = '$lastname'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("ERROR: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['Firstname'] = $data['Firstname'];
        $_SESSION['Trainee_Id'] = $data['Trainee_Id'];
        header("Location:userPage.php");
        exit();
    } else {
        $error = "Invalid Trainee Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="icon" type="image/png" href="gikonko.png" />
    <link href="output.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-blue-100 flex items-center justify-center">
    <form action="" method="post" class="bg-green-400 p-8 rounded-xl shadow-2xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6 underline">Student Login</h2>

        <label class="block text-blue-700 font-semibold mb-1">Trainee Code</label>
        <input type="text" name="Trainee_Id" 
               class="w-full p-3 rounded bg-green-100 shadow-inner mb-4 focus:outline-none focus:ring-2 focus:ring-green-500 text-green-700" />

        <label class="block text-blue-700 font-semibold mb-1">First Name</label>
        <input type="text" name="Firstname" 
               class="w-full p-3 rounded bg-green-100 shadow-inner mb-4 focus:outline-none focus:ring-2 focus:ring-green-500 text-green-700" />

        <label class="block text-blue-700 font-semibold mb-1">Last Name</label>
        <input type="text" name="lastname" 
               class="w-full p-3 rounded bg-green-100 shadow-inner mb-6 focus:outline-none focus:ring-2 focus:ring-green-500 text-green-700" />

        <button name="login" 
                class="w-[50%] bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 font-semibold transition duration-300 mb-4">
            Login
        </button>

        <a href="login.php" class="text-blue-800 hover:underline text-sm block text-center">← Back to Main Login</a>

        <?php if (!empty($error)): ?>
            <div class="mt-4 bg-red-200 border border-red-500 text-red-700 px-4 py-2 rounded text-center">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>
