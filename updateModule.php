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
</head>
<body class="min-h-screen bg-blue-100 flex flex-col">

    <!-- Nav at the top -->
    <div class="w-full">
        <?php include("Dashboard.php"); ?>
    </div>

    <!-- Main content: form centered -->
    <main class="flex-grow flex justify-center items-center p-9">
        <form action="" method="post" class="bg-green-500 p-6 max-w-md w-full rounded-lg shadow-2xl">
            <h1 class="text-lg text-center text-blue-600 font-bold underline mb-4">Update Module <?php echo $Module['Module_Name']; ?></h1>

            <label class="block text-lg text-blue-600 font-bold">Module Code</label>
            <input type="text" name="Module_Id" value="<?php echo $Module['Module_Id']; ?>" readonly
                class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300 mb-3" />

            <label class="block text-lg text-blue-600 font-bold">Module Name</label>
            <input type="text" name="Module_Name" value="<?php echo $Module['Module_Name']; ?>"
                class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300 mb-3" />

            <label class="block text-lg text-blue-600 font-bold">Trade Code (readonly)</label>
            <input type="text" name="Trade_Id" value="<?php echo $Module['Trade_Id']; ?>" readonly
                class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300 mb-3" />

            <label class="block text-lg text-blue-600 font-bold">Trade Name</label>
            <select name="Trade_Id" class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300 mb-4">
                <?php
                $sql = "SELECT * FROM trades";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($query)) {
                    $selected = ($data['Trade_id'] == $Module['Trade_Id']) ? 'selected' : '';
                    echo "<option value='" . $data['Trade_id'] . "' $selected>" . $data['Trade_name'] . "</option>";
                }
                ?>
            </select>

            <div class="flex justify-between mb-4">
                <button name="save" class="bg-blue-500 py-2 px-5 text-white rounded-lg shadow-2xl hover:bg-blue-600 transition duration-200">Save Changes</button>
                <a href="Dashboard.php" class="bg-red-500 py-2 px-5 text-white rounded-lg shadow-2xl hover:bg-red-600 transition duration-200">Back</a>
            </div>

            <?php if (!empty($error)) : ?>
                <div class="py-1 text-red-500 px-1">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
        </form>
    </main>

</body>
</html>
