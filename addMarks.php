<?php
    include("conn.php");
    session_start();

    if (!isset($_SESSION['Usename'])) {
        $_SESSION['login_error'] = "Please login to access this page";
        header("Location:login.php");
        exit();
    }

    $error = "";
    if (isset($_POST['addMarks'])) {

        if (!empty($_POST['Trainee_Id']) && !empty($_POST['Module_Id']) && !empty($_POST['Formative_Assessment']) && !empty($_POST['Summative_Assessment'])) {

            $trainee_code = $_POST['Trainee_Id'];
            $module_code = $_POST['Module_Id'];
            $Formative = $_POST['Formative_Assessment'];
            $Summative = $_POST['Summative_Assessment'];

            $checkIdOfUser = "SELECT * FROM trainees WHERE Trainee_Id = '$trainee_code'";
            $sqlOfid = mysqli_query($conn, $checkIdOfUser);

            if (mysqli_num_rows($sqlOfid) > 0) {

                if ($Formative <= 50 && $Summative <= 50) {

                    $Total = $Formative + $Summative;
                    $Decision = ($Total >= 70) ? "Competent" : "Not Competent";

                    $sql = "INSERT INTO marks(Trainee_Id, Module_Id, Formative_Assessment, Summative_Assessment, Total_Marks, decision) VALUES('$trainee_code', '$module_code', '$Formative', '$Summative', '$Total', '$Decision')";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        header("Location:listOfMarks.php");
                        exit();
                    } else {
                        die("ERROR:" . mysqli_error($conn));
                    }
                } else {
                    $error = "Marks must be less than or equal to 50";
                }
            } else {
                $error = "Code of trainee not found";
            }
        } else {
            $error = "Please fill out all the fields!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Marks</title>
    <link href="output.css" rel="stylesheet" />
    <link rel="icon" type="/png" href="gikonko.png" />
</head>
<body class="min-h-screen bg-blue-300 flex flex-col">


    <header class="sticky top-0 w-full bg-white shadow-lg z-10">
        <?php include("Dashboard.php"); ?>
    </header>

    <main class="flex-grow flex justify-center items-center p-9">
        <form method="post" class="max-w-md w-full space-y-6 bg-green-400 p-9 rounded-lg shadow-2xl">
            <h1 class="text-xl font-bold text-blue-700 underline text-center">Add Marks</h1>

            <div>
                <label for="Trainee_Id" class="block mb-1 font-semibold text-blue-700">Trainee Code</label>
                <input
                    type="text"
                    id="Trainee_Id"
                    name="Trainee_Id"
                    class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none"
                    required
                />
            </div>

            <div>
                <label for="Module_Id" class="block mb-1 font-semibold text-blue-700">Module Name</label>
                <select
                    id="Module_Id"
                    name="Module_Id"
                    class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none"
                    required
                >
                    <option value="" disabled selected>Select Module</option>
                    <?php
                        $sql = "SELECT * FROM modules";
                        $query = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_assoc($query)) {
                            echo "<option value='" . $data['Module_Id'] . "'>" . $data['Module_Name'] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="Formative_Assessment" class="block mb-1 font-semibold text-blue-700">Formative Assessment Marks / 50</label>
                <input
                    type="number"
                    id="Formative_Assessment"
                    name="Formative_Assessment"
                    class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
            </div>

            <div>
                <label for="Summative_Assessment" class="block mb-1 font-semibold text-blue-700">Summative Assessment Marks / 50</label>
                <input
                    type="number"
                    id="Summative_Assessment"
                    name="Summative_Assessment"
                    class="w-full py-2 rounded-lg shadow-lg bg-green-200 text-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
            </div>

            <div class="flex justify-between">
                <button
                    type="submit"
                    name="addMarks"
                    class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-xl hover:bg-blue-700 transition duration-200"
                >
                    Save Marks
                </button>
                <a
                    href="listOfMarks.php"
                    class="bg-red-600 text-white py-2 px-6 rounded-lg shadow-xl hover:bg-red-700 transition duration-200 flex items-center justify-center">
                    Back
                </a>
            </div>

            <?php if (!empty($error)): ?>
                <p class="text-red-700 text-center font-semibold"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </main>

</body>
</html>
