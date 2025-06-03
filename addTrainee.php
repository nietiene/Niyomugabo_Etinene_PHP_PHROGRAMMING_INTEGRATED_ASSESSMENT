    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Trainee</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-green-100 flex justify-center items-center">
        <form action="" method="post" class="bg-blue-700 p-8 max-w-lg w-full rounded-lg shadow-2xl">
            <h1 class="text-center text-green-500 text-xl underline mb-6">Add New Trainee</h1>
            <label class="text-lg text-green-500 font-semibold">First Name:</label>
            <input type="text" name="Firstname" 
            class="w-[78%] py-2 bg-blue-200 rounded-lg focus:outline-none text-blue-500 focus:ring-2 mb-6"> <br>

            <label class="text-lg text-green-500 font-semibold">Last Name:</label>
            <input type="text" name="lastname" 
            class="w-[78.5%] py-2 bg-blue-200 rounded-lg focus:outline-none text-blue-500 focus:ring-2 mb-6"> <br>

            <label class="text-lg text-green-500 font-semibold">Gender:</label>
            <select name="gender" class="w-[78%] ms-7 py-2 bg-blue-200 rounded-lg focus:outline-none text-blue-500 focus:ring-2 mb-6">
                <option>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select> <br>
            <label class="text-lg text-green-500 font-semibold">Trade:</label>
              <select name="Trade_id" class="w-[79%] ms-9 py-2 bg-blue-200 rounded-lg focus:outline-none text-blue-500 focus:ring-2 mb-6">
                <?php
                  include("conn.php");
                  $sql = "SELECT * FROM trades";
                  $query = mysqli_query($conn, $sql);
                  while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='". $data['Trade_id'] . "'>" . $data['Trade_name'] . "</option>";
                  }
                ?>
              </select><br>
           
              <div class="flex justify-between">
                   <button name="add" class="px-8 py-2 bg-green-500 rounded-lg text-white font-semibold hover:bg-green-600 shadow-lg">Save</button>
                   <a href="Dashboard.php" class="px-8 me-2 py-2 bg-red-500 rounded-lg text-white font-semibold hover:bg-red-600 shadow-lg">Back</a>
            </div>
        </form>

        <?php
            include("conn.php");
        
            $
            if (isset($_POST['add'])) {

                $firstName = $_POST['Firstname'];
                $lastName = $_POST['lastname'];
                $gender = $_POST['gender'];
                $trade_id = $_POST['Trade_id'];

                $sql = "INSERT INTO trainees(firstName,lastname,gender,Trade_id) VALUES('$firstName', '$lastName', '$gender', '$trade_id')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location:listOfTrainee.php");
                } else {
                    echo "Error" . mysqli_error($conn);
                } 
            }



        ?>
    </body>
    </html>