
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
    $bmi = "";
    $classify = "";
    if($user["BMI"] > 0){
        $bmi = number_format($user["BMI"], 2);
        if ($bmi < 18.5) {
            $classify = "(Underweight)";
        } elseif ($bmi < 24.9) {
            $classify = "(Normal)";
        } elseif ($bmi < 29.9) {
            $classify = "(Overweight)";
        } else {
            $classify = "(Obesity)";
        }
    }
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
            <li><a href="lesson.php">Lessons</a></li>
            <li><a href="calculator.php">Calculator</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
