<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Marks</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex flex-col px-4 py-6 bg-green-100 justify-center text-center">
    <div class="w-full max-w-7xl bg-blue-300 shadow-xl rounded-lg p-6">
        <div class="flex justify-between items-center mb-[5%]">
             <h1 class="text-2xl font-bold text-green-500">List Of Marks</h1>
             <a href="addMarks.php" class="bg-green-500 py-2 px-4 text-white rounded-lg shadow-lg hover:bg-green-700">Add Marks To Trainee</a>
        </div>
    
    <div class="overflow-w-auto"> 
        <table border="2" cellpadding="5" cellspacing="2"
        class="border border-blue-500 rounded-lg text-sm"
    >
       <tr class="bg-green-500 text-blue-800">
          <th class="py-3 px-1 border-b border-e border-blue-500">Mark Code</th>
          <th class="py-3 px-1 border-b border-e border-blue-500">Trainee Code</th>
          <th class="py-3 px-1 border-b border-e border-blue-500">Trainee Name</th>
          <th class="py-3 px-1 border-b border-e border-blue-500">Module Code</th>
          <th class="py-3 px-2 border-b border-e border-blue-500">Module Name</th>
          <th class="py-3 px-2 border-b border-e border-blue-500">Formative Assessment /50</th>
          <th class="py-3 px-2 border-b border-e border-blue-500">Formative Assessment /50</th>
          <th class="py-3 px-2 border-b border-e border-blue-500">Total /100</th>
          <th class="py-3 px-2 border-b border-e border-blue-500">Decision</th>
          <th colspan="2" class="py-3 px-2 border-b border-blue-500">Modification</th>
        </tr>
       
     <?php
         include ("conn.php");
         $sql = " SELECT m.Mark_Id, 
                  m.Trainee_Id, 
                  CONCAT(t.Firstname, ' ', t.lastname) AS Trainee_Name, 
                  m.Module_Id, 
                  md.Module_Name,
                  m.Formative_Assessment,
                  m.Summative_Assessment,
                  m.Total_Marks,
                  m.Decision
                  FROM marks m
                  JOIN trainees t ON m.Trainee_Id = t.Trainee_Id 
                  JOIN modules md ON m.Module_Id = md.Module_Id
                  ORDER BY m.Trainee_Id ASC
                  ";
                  
          $query = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_assoc($query)) {
            echo 
               "
               <tr class='hover:bg-green-400 text-blue-700'>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Mark_Id']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Trainee_Id']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Trainee_Name']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Module_Id']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Module_Name']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Formative_Assessment']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Summative_Assessment']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Total_Marks']}</td>
                   <td class='py-3 px-2 border-b border-blue-500 border-e'>{$data['Decision']}</td>
                   <td><a href='updateMarks.php?Mark_Id={$data['Mark_Id']}'  class='py-3 px-2  border-blue-500 hover:underline'>Update</a></td>
                   <td><a href='deleteMarks.php?Mark_Id={$data['Mark_Id']}'  class='py-3 px-2  border-blue-500 hover:underline text-red-500'>Delete</a></td>
               ";
          }

     ?>
    </table>
    </div>  
    </div>
</body>
</html>