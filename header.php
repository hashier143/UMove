
<?php
$name = "Log-in/Sign-up";
require_once "database.php";
if(isset($_SESSION['user'])){
$id = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE id = $id";  
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);



if(isset($user)){
    $name = $user["firstname"]." ".$user["lastname"];
    $email = $user["email"];
}
}
$profilePic = $user['profile_pic'] ?? 'styles/images/profile-icon.png';
?>

<div class = "nav-container">
        <div>
            <img class="minipfp" src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Picture">
            <p><a href="<?php echo isset($user) ? 'profile.php' : 'login.php'; ?>"class="login"><?php echo $name ?></a></p>
        </div>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="https://youtu.be/vahBUitgPNE?si=vhbYNoCde-VrH_pc&t=63">Lessons</a></li>
            <li><a href="imy.php">Calculator</a></li>
            <li><a href="">About</a></li>
        </ul>
    </div>
