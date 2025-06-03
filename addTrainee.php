    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Trainee</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-green-100 flex justify-center items-center">
        <form action="" method="post" class="bg-blue-200 p-8 max-w-lg w-full rounded-lg shadow-2xl">
            <h1>Add New Trainee</h1>
            <label for="">Firstname</label>
            <input type="text" name="Firstname" > <br>

            <label for="">Last Name</label>
            <input type="text" name="lastname" > <br>

            <label for="">Gender</label>
            <select name="gender" >
                <option>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select> <br>
            <label >Select Trade</label>
              <select name="Trade_id">
                <?php
                  include("conn.php");
                  $sql = "SELECT * FROM trades";
                  $query = mysqli_query($conn, $sql);
                  while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='". $data['Trade_id'] . "'>" . $data['Trade_name'] . "</option>";
                  }
                ?>
              </select><br>

            <button name="add">Save</button>
        </form>

        <?php
            include("conn.php");
        
            if (isset($_POST['add'])) {
                $firstName = $_POST['Firstname'];
                $lastName = $_POST['lastname'];
                $gender = $_POST['gender'];
                $trade_id = $_POST['Trade_id'];

                $sql = "INSERT INTO trainees(firstName,lastname,gender,Trade_id) VALUES('$firstName', '$lastName', '$gender', '$trade_id')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "Data inserted Successfully";
                } else {
                    echo "Error" . mysqli_error($conn);
                } 
            }



        ?>
    </body>
    </html>