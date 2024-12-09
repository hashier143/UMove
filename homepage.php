<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="styles/about.css">
    <title>Home</title>
</head>

<body>
    <?php include "header.php"?>

    <div class="image-top">
        <h2>UMOVE!</h2>
        <h3>Track Your Health, Herons!</h3>
    </div>

    <div class="desc-container">

        <div class="desc1">
           <div class="container">
                <div class="wrapper">
                    <img src="styles/images/slide3.jpg">
                    <img src="styles/images/slide2.png">
                    <img src="styles/images/slide1.jpg">
                    <img src="styles/images/slide3.jpg">
                </div>
           </div>
        </div>

        <div class="desc2">

          <div class="desc2-1">
            <h3>Progress Tracking Made Easy</h3>
            <h4>Students can monitor their performance and teachers can track progress, ensuring everyone stays on top of their health goals.</h4>
          </div>

          <div class="desc2-2">
            <h3>Resources for Students</h3>
            <h4>Students can access resources, connect with teachers. A healthier, stronger community starts here!</h4>
          </div>

        </div>

    </div>
</body>
</html>