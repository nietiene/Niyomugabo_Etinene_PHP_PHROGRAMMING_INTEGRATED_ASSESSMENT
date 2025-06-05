<?php 
include("conn.php");
session_start();

if (!isset($_SESSION['Usename'])) {
    $_SESSION['login_error'] = "Please login to access this page";
    header("Location:login.php");
    exit();
}

$error = "";
if (isset($_POST['add'])) {
    if (!empty($_POST['Firstname']) && !empty($_POST['lastname']) && !empty($_POST['gender']) && !empty($_POST['Trade_id'])) {
        $firstName = $_POST['Firstname'];
        $lastName = $_POST['lastname'];
        $gender = $_POST['gender'];
        $trade_id = $_POST['Trade_id'];

        $sql = "INSERT INTO trainees(firstName,lastname,gender,Trade_id) VALUES('$firstName', '$lastName', '$gender', '$trade_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:listOfTrainee.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Please Fill empty space";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add New Trainee</title>
    <link href="output.css" rel="stylesheet" />
    <link rel="icon" type="/png" href="gikonko.png" />
</head>

<body class="min-h-screen bg-green-100 p-5">

    <header class="sticky top-0 w-full bg-white shadow-md z-10">
        <?php include("Dashboard.php"); ?>
    </header>


    <main class="min-h-screen flex justify-center items-end p-5">
        <form action="" method="post" class="bg-blue-700 p-6 max-w-md w-full rounded-lg shadow-2xl">
            <h1 class="text-2xl text-green-500 font-semibold mb-6 text-center underline">Add New Trainee</h1>

            <label class="block text-green-500 font-semibold text-lg mb-2" for="Firstname">First Name:</label>
            <input type="text" id="Firstname" name="Firstname"
                class="py-2 w-full focus:ring-2 focus:outline-none focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6" />

            <label class="block text-green-500 font-semibold text-lg mb-2" for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname"
                class="py-2 w-full focus:ring-2 focus:outline-none focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6" />

            <label class="block text-green-500 font-semibold text-lg mb-2" for="gender">Gender:</label>
            <select id="gender" name="gender"
                class="py-2 w-full focus:ring-2 focus:outline-none focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6">
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label class="block text-green-500 font-semibold text-lg mb-2" for="Trade_id">Trade:</label>
            <select id="Trade_id" name="Trade_id"
                class="py-2 w-full focus:ring-2 focus:outline-none focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6">
                <option value="" disabled selected>Select Trade</option>
                <?php
                $sql = "SELECT * FROM trades";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . htmlspecialchars($data['Trade_id']) . "'>" . htmlspecialchars($data['Trade_name']) . "</option>";
                }
                ?>
            </select>

            <div class="flex justify-between">
                <button type="submit" name="add"
                    class="bg-green-500 px-6 py-2 rounded-lg shadow-md text-white hover:bg-green-600 transition">
                    Save
                </button>
                <a href="listOfTrainee.php"
                    class="bg-red-500 px-6 py-2 rounded-lg shadow-md text-white hover:bg-red-600 transition">
                    ← Back
                </a>
            </div>

            <?php if (!empty($error)): ?>
                <div class="mt-4 text-red-500 text-center font-semibold">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
        </form>
    </main>

</body>

</html>
