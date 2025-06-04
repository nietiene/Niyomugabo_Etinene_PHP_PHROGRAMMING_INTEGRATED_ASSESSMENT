<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competent List</title>
        <link href="output.css" rel="stylesheet">
</head>
<body  class="min-h-screen bg-green-100 flex justify-center items-center">
    <div class="bg-blue-400 p-8 rounded-lg shadow-2xl">
    <div class="flex justify-between mb-6">
          <h1 class="text-xl font-bold text-green-700 underline">Competent Trainees List </h1>
          <a href="dashboard.php" class="bg-red-500 px-7 py-2 text-white rounded-lg hover:bg-red-300 transition duration-400">Back</a>
    </div>
    <div class="overflow-x-auto">
    <table border="2" class="min-w-full border border-blue-600 rounded-lg text-sm">
        <thead class="bg-green-500 text-blue-700 font-semibold">
            <tr>
                <th class="px-7 py-2 border-b border-blue-500">Trainee Code</th>
                <th class="px-7 py-2 border-b border-blue-500">Trainee Name</th>
                <th class="px-7 py-2 border-b border-blue-500">Module Code</th>
                <th class="px-7 py-2 border-b border-blue-500">Module Name</th>
                <th class="px-7 py-2 border-b border-blue-500">Decision</th>
            </tr>
        </thead>
        <tbody class="font-semibold text-green-700">
            <?php
                 include("conn.php");
               
                $sql = "SELECT m.Trainee_Id , 
                         CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name,
                         m.Module_Id,
                         md.Module_Name,
                         m.decision,
                         m.Total_Marks
                         FROM marks m 
                         JOIN Trainees t ON t.Trainee_Id = m.Trainee_Id
                         JOIN modules md ON m.Module_Id = md.Module_Id
                         HAVING m.Total_Marks >= 70";

                $query = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($query) > 0) {
                    while($data = mysqli_fetch_assoc($query)) {
                        echo 
                        "
                         <tr>
                             <td class='px-7 py-2 border-b border-blue-500'>{$data['Trainee_Id']}</td>
                             <td class='px-7 py-2 border-b border-blue-500'>{$data['Trainee_Name']}</td>
                             <td class='px-7 py-2 border-b border-blue-500'>{$data['Module_Id']}</td>
                             <td class='px-7 py-2 border-b border-blue-500'>{$data['Module_Name']}</td>
                             <td class='px-7 py-2 border-b border-blue-500 text-green-900'>{$data['decision']}</td>
                         </tr>
                        ";
                    }
                } else {
                      echo "<tr class='px-7 py-2 border-b border-blue-500 text-red-500'><td colspan='5'>No Record In table</td>";
                }

            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>