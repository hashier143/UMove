<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAK Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>UMAK</h1>
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = $user["id"];
                    header("Location: homepage.php");
                    die();
                }else{
                    echo "<div class='signup-errors'> &#9888 Password does not match </div>";
                }
            }else{
                echo "<div class='signup-errors'> &#9888 Email does not match </div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="umak-email">UMak Email</label>
                <input type="email" id="umak-email" name="email">
            </div>
            <div class="input-group eye">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="fa fa-fw fa-eye field-icon toggle-password" toggle="#password"></span>
            </div>
            <div class="button">
                <button type="submit" class="login-btn" name="login">Log In</button>
                <a href="signup.php" class="Register">No account? Sign Up</a>
            </div>
        </form>
    </div>

    
    <script>
        $(document).ready(function () {
            $(".toggle-password").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                let input = $($(this).attr("toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
</body>
</html>
