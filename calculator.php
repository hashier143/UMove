
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="styles/calculator.css">
    <title>Calculator</title>
</head>

<?php 
session_start();
    if(isset($_POST["weight"]) && isset($_POST["height"])){
        $weight = (float)$_POST["weight"];
        $height = (float)$_POST["height"];
        $results = $weight / ($height * $height);
    }
?>


<body>
    <?php include "header.php" ?>
    <?php include "bmi-insert.php" ?>
    <div class="container-bmi">
        <div class="bmi-left">
            <h2 class="BMI-text">BMI</h2>
            <h3 class="BMI-whole">BODY MASS INDEX</h3>
        </div>
        <div class="bmi-right">
            <form action="calculator.php" method="post">
                <div class="div-align">
                    <label for="weight" >Weight(kilogram/s)</label>
                    <input type="number" id="weight" name="weight" min="1" max="150" required step="any">
                </div>
                <div class="div-align">
                    <label for="height">Height(meter/s)</label>
                    <input type="number" id="height" name="height" min="0.1" max="2.5" required step="any">
                </div>
                <div class="div-align button-calc">
                    <input type="submit" name="submit" value="Submit" class="button-color">
                </div>
            </form>
            <div class="div-status"><h1 class="status">STATUS: <?php echo isset($results) ? number_format($results, 2).$classify : " "?></h1></div>
        </div>
    </div>
</body>
</html>