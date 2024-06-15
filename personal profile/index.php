<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link rel="stylesheet" href="css/stlyles.css">
</head>
<body>
    <h1>Create Your Profile</h1>
    <form action="save_profile.php" method="post" enctype="multipart/form-data">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="age">phone number:</label><br>
        <input type="text" id="phone" name="phone" required><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br>
        
        <label for="profile_pic">Profile Picture:</label><br>
        <input type="file" id="profile_pic" name="profile_pic" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
