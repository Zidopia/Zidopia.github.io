<?php
@include 'config.php';



// Fetch data from the database table for contact form
$sql = "SELECT * FROM contact_form";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Contact Form</title>

   <!-- Custom CSS file link -->
   <style>
      table {
         border-collapse: collapse;
         width: 100%;
      }
      
      th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }
      
      tr:nth-child(even) {
         background-color: #f2f2f2;
      }
   </style>
</head>
<body>

   <h1>Contact Form Entries</h1>

   <?php if ($result->num_rows > 0): ?>
      <table>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
         </tr>
         <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['message']; ?></td>
            </tr>
         <?php endwhile; ?>
      </table>
   <?php else: ?>
      <p>No Message found.</p>
   <?php endif; ?>
   <button >
                <a  href="admin_page.php" style="text-decoration:none ;background-color:4CAF50"> Back To Admin Page</a> 
            </button>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
