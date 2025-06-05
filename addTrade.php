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
    if (!empty($_POST['Trade_name'])) {
        $Trade_Name = $_POST['Trade_name'];
        $sql = "INSERT INTO trades(Trade_name) VALUES('$Trade_Name')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location:listOfTrades.php");
        } else {
            die("ERROR:" . mysqli_error($conn));
        }
    } else {
        $error = "Please Trade Name Can't be blank !!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Add Trade</title>
<link href="output.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-green-100">

    <!-- Sticky nav bar -->
    <header class="sticky top-0 w-full bg-white shadow-md z-10">
        <?php include("Dashboard.php"); ?>
    </header>

    <!-- Content pushed below nav -->
    <main class="flex justify-center items-start pt-20 px-4 min-h-screen">
        <form method="post" class="bg-blue-700 w-full max-w-sm rounded-lg px-4 py-6 shadow-2xl">
            <h1 class="text-2xl text-green-500 font-semibold mb-6 text-center underline">Add New Trade</h1>

            <label class="block text-green-500 font-semibold text-lg mb-2">Trade Name:</label>
            <input type="text" name="Trade_name" 
                class="py-2 w-full focus:ring-2 focus:outline-blue-200 focus:ring-blue-300 bg-blue-200 rounded-lg text-blue-500 mb-6" />

            <div class="flex justify-between">
                <button name="add" 
                    class="bg-green-500 px-5 py-2 rounded-lg shadow-md text-white hover:bg-green-600 transition">
                    Add New
                </button>
                <a href="Dashboard.php" 
                    class="bg-red-500 px-5 py-2 rounded-lg shadow-md text-white hover:bg-red-600 transition">
                    Back
                </a>
            </div>

            <?php if (!empty($error)): ?>
            <div class="py-1 text-red-500 px-1 mt-4">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
        </form>
    </main>

</body>
</html>
