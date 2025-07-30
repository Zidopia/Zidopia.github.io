<?php
@include 'config.php';



// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve blog ID from the form
    $blogId = $_POST['blog_id'];

    // Delete the blog entry from the table
    $query = "DELETE FROM blogs WHERE id = '$blogId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'Blog deleted successfully.';
        } else {
            echo 'No blog found with this ID.';
        }
    } else {
        echo 'Error deleting blog: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Delete Blog</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Delete Blog</h1>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Blog ID:</label>
        <input type="text" name="blog_id" required>
        
        <button type="submit">Delete</button>
        <button type="submit" >
                <a  href="admin_page.php" style="text-decoration:none ;color:white"> Back To Admin Page</a> 
            </button>
    </form>
   
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
