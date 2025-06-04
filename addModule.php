 <?php
        include("conn.php");
        

   include("conn.php");
   session_start();

    if (!isset($_SESSION['Usename'])) {
       $_SESSION['login_error'] = "Please login to access this page";
       header("Location:login.php");
       exit();
   }


        $error = "";
        if (isset($_POST['addModule'])) {
            if (!empty($_POST['Module_Name']) && !empty($_POST['Trade_Id'])) {
                $Module_Name = $_POST['Module_Name'];
                $Trade_Id = $_POST['Trade_Id'];
                
                $sql = "INSERT INTO modules(Module_Name, Trade_Id) VALUES('$Module_Name', '$Trade_Id')";
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Module</title>
        <link href="output.css" rel="stylesheet">

    </head>
    <body class="min-h-screen bg-blue-100 flex justify-center items-center">
        <form action="" method="post" class="bg-green-500 p-6 max-w-md w-[35%] rounded-lg shadow-2xl">
            <h1 class="text-lg text-center text-blue-500 underline">Add Module</h1>
            <label class="block text-lg text-blue-500">Module Name:</label>
            <input type="text" name="Module_Name" 
            class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300"/> <br>
            <label class="block text-lg text-blue-500">Trade:</label>
            <select name="Trade_Id" class="w-full py-2 rounded-lg bg-green-200 text-green-500 focus:outline-green-300 mb-6">
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
            
           <div class="flex justify-between mb-4">
                  <button name="addModule" class="bg-blue-500 py-2 px-5 text-white rounded-lg shadow-2xl hover:bg-blue-600 transition duration-200">Save Module</button>
                  <a href="Dashboard.php" class="bg-red-500 py-2 px-5 text-white rounded-lg shadow-2xl hover:bg-red-600 transition duration-200">Back</a>
            </div>
            
            <?php if (!empty($error)): ?>
                <div class="py-1 text-red-500 px-1">
                </div>
             <?php endif; ?>   
        </form>

    </body>
    </html>