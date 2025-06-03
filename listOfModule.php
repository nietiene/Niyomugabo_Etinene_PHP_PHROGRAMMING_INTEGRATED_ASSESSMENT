<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Modules</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-green-100 flex justify-center items-center">
    <div class="bg-blue-300 p-8 px-10 py-10 shadow-2xl rounded-md ">
    <div class="flex justify-end">
       <a href="addModule.php" class="mb-7 bg-green-500 py-2 px-5 text-white rounded-lg hover:bg-green-700">Add New Module</a>
    </div>
    <div class="overflow-x-auto rounded-sm">
    <table border="2" cellspacing="2" cellpadding="5"
    class="border border-blue-600 text-sm">
        <tr class="bg-green-500 text-blue-700">
          <th class="px-10 border-b border-blue-500">Module Code</th>
          <th class="px-10 border-b border-blue-500">Module Name</th>
          <th class="px-10 border-b border-blue-500">Trade Code</th>
          <th class="px-10 border-b border-blue-500">Trade Name</th>
          <th colspan="2" class="px-10 border-b border-blue-500">Modification</th>
        </tr>

        <?php
            include("conn.php");

            $sql = "SELECT
              m.Module_Id,
              m.Module_Name,
              m.Trade_Id,
              t.Trade_name
              FROM modules m 
              JOIN trades t
              ON t.Trade_id = m.Trade_Id";

            $result = mysqli_query($conn, $sql);
           
            if (mysqli_num_rows($result) > 0) {
                while($data = mysqli_fetch_assoc($result)) {
                    echo 
                      "
                      <tr>
                          <td>{$data['Module_Id']}</td>
                          <td>{$data['Module_Name']}</td>
                          <td>{$data['Trade_Id']}</td>
                          <td>{$data['Trade_name']}</td>
                          <td><a href='updateModule.php?Module_Id={$data['Module_Id']}'>Update</a></td>
                          <td><a href='deleteModule.php?Module_Id={$data['Module_Id']}'>Delete</a></td>
                      </tr>
                      ";
                } 
            }else {
                    echo "No data Found!!!!!";
            }
       ?>
    </table>
    </div>
    </div>
</body>
</html>