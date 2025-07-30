<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user_db';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $date = $_POST['date'];
    $author = $_POST['author'];

    // Prepare the SQL statement
    $query = "INSERT INTO blogs (title, description, content, image_url, date, author) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, 'ssssss', $title, $description, $content, $image_url, $date, $author);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($statement);

    if ($result) {
        echo 'Data inserted successfully.';
    } else {
        echo 'Error inserting data: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Add Blog</title>
        
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
        }
        
        .insert-container {
            max-width: 400px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="date"],
        textarea {
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
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        } button[type="submit"] {
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

    <h1 style="text-align:center">Add Blog</h1>
    <div class="insert-container">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description:</label><br>
        <input type="text" name="description" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" required></textarea><br><br>

        <label>Image URL:</label><br>
        <input type="text" name="image_url"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <button type="submit">Submit</button>
        <button type="submit" >
                <a  href="admin_page.php" style="text-decoration:none ;color:white"> Back To Admin Page</a> 
            </button>
    </form>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
