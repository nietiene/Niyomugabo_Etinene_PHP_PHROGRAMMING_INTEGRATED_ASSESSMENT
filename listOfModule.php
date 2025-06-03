<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Modules</title>
</head>
<body>
    <a href="addModule.php">Add New Module</a>
    <table border="2" cellspacing="2" cellpadding="5">
        <tr>
          <th>Module Code</th>
          <th>Module Name</th>
          <th>Trade Code</th>
          <th>Trade Name</th>
          <th colspan="2">Modification</th>
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
</body>
</html>