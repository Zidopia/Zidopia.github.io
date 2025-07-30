-- Create the user_db database
CREATE DATABASE IF NOT EXISTS user_db;

-- Switch to the user_db database
USE user_db;

-- Create the blogs table
CREATE TABLE IF NOT EXISTS blogs (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  image_url VARCHAR(255),
  date DATE,
  author VARCHAR(50)
);

-- Create the comments table
CREATE TABLE IF NOT EXISTS comments (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  blog_id INT(11) NOT NULL,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  comment TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (blog_id) REFERENCES blogs(id)
);
-- Inserting another blog post
INSERT INTO blogs (title, description, content, image_url, date, author)
VALUES 
    ('A Snapshot of Achievement and Friendship',
    'In this blog post, I want to share a special photograph captured in 2021, marking the end of our 12th grade entrance exams and capturing the bond of friendship and accomplishment.',
    'The photograph shows my classmates and me, standing together with smiles of pride and relief. It represents the hard work and dedication we put into our studies, as well as the friendships that helped us navigate the challenges of the exam season. As we stood in that moment, we were on the cusp of a new beginning, each with unique dreams and aspirations. The photograph symbolizes the diverse paths we were about to embark upon, while also preserving the memories we created together.',
    'images/blog1.jpg',
    '2023-06-05',
    'Ziyad'),
    ('Macito: Fueling my Love for Studying',
    'In this blog post, I want to introduce you to Macito, a powerful tool that has transformed my study routine.',
    'Macito''s organizational system keeps my study materials neatly arranged, saving time and improving efficiency. Its distraction-free environment eliminates digital clutter, allowing me to focus on studying without interruptions. With seamless synchronization across devices, I can study anywhere, anytime. Macito''s annotation and highlighting features facilitate interactive learning, while its time management tools help me study smart and achieve my academic goals.',
    'images/blog7.jpg',
    '2023-06-16',
    'Ziyad'),
    ('Unveiling the Magic: Why I Chose Computer Science as My Path',
    'In this blog post, I want to share the story behind my decision to pursue computer science—a journey that has led me to discover a world of endless possibilities and the magic that lies within the realm of technology.',
    'Computer science unleashes my problem-solving superpower, allowing me to creatively tackle complex challenges. Its limitless innovation potential captivates me, as it empowers me to build the future through groundbreaking advancements. The field''s versatility and adaptability ensure a dynamic career, while collaboration and making a meaningful impact on society inspire me. Embracing the adventure of lifelong learning keeps me motivated in this ever-evolving field.',
    'images/blog10.jpg',
    '2023-06-19',
    'Ziyad'),
 ('Celebrating Success: A Memorable Night with Friends at Marconal Restaurant',
    'In this blog post, I want to share a special memory of celebration and friendship. It was a night filled with joy and excitement when my friends and I received our hard-earned fees for our online work on fias.com.',
    'Receiving our fees marked a thrilling achievement, symbolizing the culmination of our efforts on fias.com. To honor our success, we decided to celebrate at Marconal Restaurant, indulging in a culinary delight that perfectly complemented our joyous gathering. Laughter, stories, and toasts filled the air as we embraced the bonds we had formed through our work.',
    'images/blog8.jpg',
    '2023-06-22',
    'ziyad');

-- Create the contact_form table
CREATE TABLE IF NOT EXISTS contact_form (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  number VARCHAR(20),
  email VARCHAR(100) NOT NULL,
  subject VARCHAR(100),
  message TEXT
);

-- Create the user_form table
CREATE TABLE IF NOT EXISTS user_form (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  user_type VARCHAR(20)
);
INSERT INTO user_form (name, email, password, user_type)
VALUES 
    ('Ziyad', 'Ziyad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
    ('Mohammed', 'Mohammed@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');

