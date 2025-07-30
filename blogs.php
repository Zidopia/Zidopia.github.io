<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS -->
<style>
    .comment-form {
        margin-top: 20px;
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .comment-form input[type="text"],
    .comment-form input[type="email"],
    .comment-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .comment-form textarea {
        resize: vertical;
        height: 100px;
    }

    .comment-form button[type="submit"] {
        padding: 10px 20px;
        background-color: #4267B2;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .comment-form button[type="submit"]:hover {
        background-color: #29487D;
    }
</style>


</head>
<body>
    
<!-- navbar section starts  -->
<nav class="navbar">
    <a href="home.html"> <i class="fas fa-home"></i> <span>home</span> </a>
    <a href="about.html"> <i class="fas fa-user"></i> <span>about</span> </a>
    <a href="portfolio.html"> <i class="fas fa-briefcase"></i> <span>portfolio</span> </a>
    <a href="blogs.php"> <i class="fas fa-blog"></i> <span>blogs</span> </a>
    <a href="contact.html"> <i class="fas fa-address-book"></i> <span>contact</span> </a>
    <a href="logout.php"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> <span>Log Out</span> </a>
</nav>
<!-- navbar section ends -->

<!-- blogs section starts  -->
<section class="blogs">
    <h1 class="heading"> <span>my</span> blogs </h1>
    <div class="box-container">
        <?php
        // Database connection
        $host = 'localhost';
        $database = 'user_db';
        $username = 'root';
        $password = '';

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        // Retrieve blog entries from the database
        $query = "SELECT * FROM blogs";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Query execution error: ' . mysqli_error($conn));
        }

        while ($blog = mysqli_fetch_assoc($result)) {
            echo '<div class="box">';
            echo '<div class="image">';
            echo '<img src="' . $blog['image_url'] . '" alt="">';
            echo '</div>';
            echo '<div class="content">';
            echo '<div class="icons">';
            echo '<a href="#"> <i class="fas fa-calendar"></i> ' . $blog['date'] . ' </a>';
            echo '<a href="#"> <i class="fas fa-user"></i> by ' . $blog['author'] . ' </a>';
            echo '</div>';
            echo '<h3>' . $blog['title'] . '</h3><br>';
            echo '<em style="color: aliceblue;">' . $blog['description'] . '</em>';
            echo '<p>' . $blog['content'] . '</p>';
        
            // Comment form
            echo '<div class="comment-form">';
echo '    <form method="POST" action="submit_comment.php">';
echo '        <input type="hidden" name="blog_id" value="' . $blog['id'] . '">';
echo '        <input type="text" name="name" placeholder="Your Name" required>';
echo '        <input type="email" name="email" placeholder="Your Email" required>';
echo '        <textarea name="comment" placeholder="Your Comment" required></textarea>';
echo '        <button type="submit">Submit Comment</button>';
echo '    </form>';
echo '</div>';

        
            echo '</div>';
            echo '</div>';
        }
        
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</section>
<!-- blogs section ends -->

</body>
</html>
