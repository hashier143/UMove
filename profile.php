<?php
session_start();
require_once "database.php";
if (isset($_POST['upload_image'])) {
    $profilePic = $_FILES['profile_pic'];

    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($profilePic['type'], $allowedTypes)) {
        die("Only JPEG, PNG, and GIF files are allowed.");
    }
    if ($profilePic['size'] > 2 * 1024 * 1024) { 
        die("File size exceeds the 2MB limit.");
    }

   
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    
    $fileExtension = pathinfo($profilePic['name'], PATHINFO_EXTENSION);
    $newFileName = uniqid('profile_', true) . '.' . $fileExtension;
    $filePath = $uploadDir . $newFileName;

   
    if (move_uploaded_file($profilePic['tmp_name'], $filePath)) {
        
        $sql = "UPDATE users SET profile_pic = ? WHERE id = ?"; 
        $stmt = mysqli_prepare($conn, $sql);
        $userId = $_SESSION["user"]; 
        mysqli_stmt_bind_param($stmt, "si", $filePath, $userId);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            echo "Failed to save profile picture in the database.";
        }
    } else {
        echo "Failed to upload the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
    <?php include "header.php"?>

    <div class="pf-container">
        <div class="pfp-side">
        <?php
            $userId = $_SESSION["user"];
            $sql = "SELECT profile_pic FROM users WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            $profilePic = $row['profile_pic'] ?? 'styles/images/profile-icon.png';
        ?>
            <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Picture">
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <label for="upload" class="custom-upload">Upload Profile Picture</label>
                <input type="file" id="upload" name="profile_pic" required>
                <button type="submit" name="upload_image" class="button_pfp">Upload</button>
            </form>
        </div>
        <div class="info-side">
            <h1>Name: <?php echo $name ?></h1>
            <h1>Email: <?php echo $email ?></h1>
            <h1>BMI: <?php echo $bmi.$classify?></h1>
            <a class="logout" href="logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>