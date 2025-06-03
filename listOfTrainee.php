<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Trainees</title>
 <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-green-100 max-h-screen flex justify-center items-center px-4">
<div class="bg-blue-200 shadow-2xl rounded-xl p-6 w-full max-w-6xl">
  <h1 class="text-center font-semibold text-2xl text-green-700 mb-6">List Of Trainees</h1>  
  <div class="flex justify-end mb-6">
    <a href="addTrainee.php" class="bg-green-400 py-2 px-5 rounded-lg shadow-lg text-white hover:bg-green-600 transition duration-200">Add Trainee</a>
  </div>
   
  <div class="overflow-x-auto rounded-lg">
   <table border="2" cellspacing="2" cellpadding="7"
   class="min-w-full text-smm border border-blue-500 shadow-lg ">
       <tr class="bg-blue-500 text-green-400"> 
           <th class="px-4 py-2">Trainee Code</th>
           <th class="px-4 py-2">First Name</th>
           <th class="px-4 py-2">Last Name</th>
           <th class="px-4 py-2">Gender</th>
           <th class="px-4 py-2">Trade Code</th>
           <th class="px-4 py-2">Trade Name</th>
           <th colspan="2" class="px-4 py-2">Modification</th>
       </tr>

       <?php
            include('conn.php');
            $sql = "SELECT t.Trainee_Id, t.Firstname, t.lastname, t.Gender, t.Trade_Id, tr.Trade_Name FROM trainees t
            JOIN trades tr ON t.Trade_Id = tr.Trade_Id
            ";
            $query = mysqli_query($conn, $sql);
            
            while ($data = mysqli_fetch_assoc($query)) {
                echo
                 "
                    <tr>
                       <td>{$data['Trainee_Id']}</td>
                       <td>{$data['Firstname']}</td>
                       <td>{$data['lastname']}</td>
                       <td>{$data['Gender']}</td>
                       <td>{$data['Trade_Id']}</td>
                       <td>{$data['Trade_Name']}</td>
                       <td><a href='updateTrainee.php?Trainee_Id={$data['Trainee_Id']}'>Update</a></td>
                       <td><a href='deleteTrainee.php?Trainee_Id={$data['Trainee_Id']}'>Delete</a></td>
                    </tr>
                ";
            }

      ?>
   </table>
   </div>
   </div>
</body>
</html>