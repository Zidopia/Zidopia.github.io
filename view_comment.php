<?php
@include 'config.php';

// Fetch data from the database table for comments
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Comments</title>

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

   <h1>Comments</h1>

   <?php if ($result->num_rows > 0): ?>
      <table>
         <tr>
            <th>ID</th>
            <th>Bolg ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
         </tr>
         <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['blog_id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['comment']; ?></td>
            </tr>
         <?php endwhile; ?>
      </table>
   <?php else: ?>
      <p>No comments found.</p>
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
