<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lsit Of Trade</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>Trade Code</th>
            <th>Trade Name</th>
            <th colspan="2">Modification</th>
        </tr>

        <?php
           include("conn.php");
          
           $sql = "SELECT * FROM trades";
           $query = mysqli_query($conn, $sql);

         if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
                echo 
                "
                 <tr>
                    <td>{$data['Trade_Id']}</td>
                    <td>{$data['Trade_Name']}</td>
                 </tr>
                ";
            }
         }

       ?>
    </table>
</body>
</html>