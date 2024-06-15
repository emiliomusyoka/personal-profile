<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'profiles_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$profile_pic = $_FILES['profile_pic']['name'];

// File upload path
$target_directory = "uploads/";
$target_file = $target_directory . basename($profile_pic);

// Move uploaded file to target directory
if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
    echo "The file ". basename( $profile_pic). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Insert data into database
$sql = "INSERT INTO profiles (full_name, email, age, profile_pic) 
        VALUES ('$full_name', '$email', '$age', '$profile_pic')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
