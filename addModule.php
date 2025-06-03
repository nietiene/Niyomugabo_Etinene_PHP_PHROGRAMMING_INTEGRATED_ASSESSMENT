    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Module</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="">Module Name</label>
            <input type="text" name="Module_Name" /> <br>
            <select name="Trade_Id" >
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