<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAK Login</title>
    <link rel="stylesheet" href="styles/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>UMAK</h1>
        <?php
            if (isset($_POST["signup"])) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["repassword"];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='signup-errors'> &#9888 Email is not valid </div>";
                    $email= "";
                   }
                   else if (strlen($password)<8) {
                    echo "<div class='signup-errors'> &#9888 Password must be at least 8 charactes long</div>";
                   }
                   else if ($password!==$passwordRepeat) {
                    echo "<div class='signup-errors'> &#9888 Password does not match. </div>";
                   }
                   else{
                    require_once "database.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if($rowCount > 0){
                            echo "<div class='signup-errors'> &#9888 Email already exist! </div>";
                        } 
                        else{
                        $sql = "INSERT INTO users (firstname, lastname, email , password) VALUES ( ?, ?, ?, ? )";
                        $stmt = mysqli_stmt_init($conn);
                        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                        if($prepareStmt) {
                            mysqli_stmt_bind_param($stmt,"ssss",$firstname, $lastname, $email, $passwordHash);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='registered'> &#9888 You're registered successfully! </div>";
                        }
                        else{
                            die("Something went wrong");
                        }
                    }
                }
                }
        ?>
        <form action="signup.php" method="post">
            <div class="input-group" id="no-bot">
                <div>
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="firstname" required value="<?php echo isset($firstname) ? $firstname : ''; ?>">
                </div>
                <div>
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="lastname" required value="<?php echo isset($lastname) ? $lastname : ''; ?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
            </div>
            <div class="input-group eye">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span class="fa fa-fw fa-eye field-icon toggle-password" toggle="#password" required></span>
                </div>
                <div>
                    <label for="repassword">Re-enter</label>
                    <input type="password" id="repassword" name="repassword">
                </div>
            </div>
            <div class="button">
                <button type="submit" class="login-btn" name="signup">Sign up</button>
                <a href="login.php" class="forgot-password">Already have an account? Log in</a>
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