<?php
include("conn.php");

session_start();

if (!isset($_SESSION['Usename'])) {
    $_SESSION['login_error'] = "Please login to access this page";
    header("Location:login.php");
    exit();
}

if (isset($_GET['Module_Id'])) {
    $Module_Id = $_GET['Module_Id'];
    $sql = "SELECT
            m.Module_Id,
            m.Module_Name,
            m.Trade_Id,
            t.Trade_name
            FROM modules m 
            JOIN trades t
            ON t.Trade_id = m.Trade_Id WHERE Module_Id = '$Module_Id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $Module = mysqli_fetch_assoc($result);
    } else {
        echo "No Module Found To Update";
    }
}

$error = "";
if (isset($_POST['save'])) {
    if (!empty($_POST['Module_Name']) && !empty($_POST['Trade_Id'])) {
        $Module_Id = $_POST['Module_Id'];
        $Module_Name = $_POST['Module_Name'];
        $Trade_Id = $_POST['Trade_Id'];

        $sql = "UPDATE modules SET Module_Name = '$Module_Name', Trade_Id = '$Trade_Id' WHERE Module_Id = '$Module_Id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location:listOfModule.php");
        } else {
            die("ERROR:" . mysqli_error($conn));
        }
    } else {
        $error = "Please fill out the empty space";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Module <?php echo $Module['Module_Name']; ?></title>
    <link href="output.css" rel="stylesheet" />
    <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="min-h-screen bg-blue-100 flex flex-col">


    <div class="w-full">
        <?php include("Dashboard.php"); ?>
    </div>


    <main class="flex-grow flex justify-center items-center p-9">
<main class="flex-grow flex justify-center items-center px-4 py-12">
    <form action="" method="post" class="bg-green-500 p-8 w-full max-w-lg rounded-xl shadow-2xl">
        <h1 class="text-2xl text-center text-blue-600 font-bold underline mb-6">
            Update Module <?php echo $Module['Module_Name']; ?>
        </h1>

        <label class="block text-lg text-blue-600 font-bold mb-1">Module Code</label>
        <input type="text" name="Module_Id" value="<?php echo $Module['Module_Id']; ?>" readonly
            class="w-full py-2 px-3 rounded-lg bg-green-200 text-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4" />

        <label class="block text-lg text-blue-600 font-bold mb-1">Module Name</label>
        <input type="text" name="Module_Name" value="<?php echo $Module['Module_Name']; ?>"
            class="w-full py-2 px-3 rounded-lg bg-green-200 text-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4" />

        <label class="block text-lg text-blue-600 font-bold mb-1">Trade Code (readonly)</label>
        <input type="text" name="Trade_Id" value="<?php echo $Module['Trade_Id']; ?>" readonly
            class="w-full py-2 px-3 rounded-lg bg-green-200 text-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4" />

        <label class="block text-lg text-blue-600 font-bold mb-1">Trade Name</label>
        <select name="Trade_Id"
            class="w-full py-2 px-3 rounded-lg bg-green-200 text-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-6">
            <?php
            $sql = "SELECT * FROM trades";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($query)) {
                $selected = ($data['Trade_id'] == $Module['Trade_Id']) ? 'selected' : '';
                echo "<option value='" . $data['Trade_id'] . "' $selected>" . $data['Trade_name'] . "</option>";
            }
            ?>
        </select>

        <div class="flex justify-between">
            <button name="save"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
                Save Changes
            </button>
            <a href="listOfModule.php"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
                ← Back
            </a>
        </div>

        <?php if (!empty($error)) : ?>
            <p class="mt-4 text-center text-red-600 font-medium"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</main>

</body>
</html>
