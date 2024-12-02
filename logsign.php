<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAK Login</title>
    <link rel="stylesheet" href="styles/logsign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>UMAK</h1>
        <form>
            <div class="input-group">
                <label for="umak-email">UMak Email</label>
                <input type="email" id="umak-email">
            </div>
            <div class="input-group eye">
                <label for="password">Password</label>
                <input type="password" id="password">
                <span class="fa fa-fw fa-eye field-icon toggle-password" toggle="#password"></span>
            </div>
            <div class="button">
                <button type="submit" class="login-btn">Log In</button>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
        </form>
    </div>

    <!-- Password toggle script -->
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
