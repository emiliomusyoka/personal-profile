<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'profiles_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form fields are set
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_FILES['profile_pic'])) {
    // Handle image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            // Insert data into database
            $stmt = $conn->prepare("INSERT INTO profiles (name, email, phone, address, profile_pic) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $phone, $address, $target_file);

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $profile_pic = $target_file;

            if ($stmt->execute()) {
                echo "Profile created successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "All form fields are required.";
}

$conn->close();
?>