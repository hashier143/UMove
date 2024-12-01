<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/landing.css">
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>UMOVE</h1>
        <h2>Heron's Fitness Hub</h2>
    </div>
    <h3 id="start-btn" onclick="startAnimation()">Click to Start</h3>
    <script>
        function startAnimation() {
            const body = document.body;
            body.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = "homepage.php";
            }, 1000);
        }
    </script>
</body>
</html>