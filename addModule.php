    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Module</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-green-100 flex justify-center items-center">
        <form action="" method="post" class="bg-green-500 p-6 max-w-md rounded-lg shadow-2xl">
            <h1 class="text-lg text-center text-blue-500 underline">Add Module</h1>
            <label class="block text-lg text-blue-500">Module Name:</label>
            <input type="text" name="Module_Name" 
            class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300"/> <br>
            <label class="block text-lg text-blue-500">Trade:</label>
            <select name="Trade_Id" class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300">
                <option>Select Trade</option>
                <?php
                include("conn.php");
                $sql = "SELECT * FROM trades";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $data['Trade_id'] . "'>" . $data['Trade_name'] . "</option>";
                }
                ?>
            </select>

            <button name="addModule">Save Module</button>
        </form>

        <?php
        
        if (isset($_POST['addModule'])) {
                $Module_Name = $_POST['Module_Name'];
                $Trade_Id = $_POST['Trade_Id'];
                
                $sql = "INSERT INTO modules(Module_Name, Trade_Id) VALUES('$Module_Name', '$Trade_Id')";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                echo "Module Saved Successfully";
                } else {
                    die (mysqli_error($conn));
                }
        }
        
        
        
        
        ?>
    </body>
    </html>