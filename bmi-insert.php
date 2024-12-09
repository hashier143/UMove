<?php
if(isset($_SESSION["user"])){
    $sql = "UPDATE users SET BMI = ? WHERE id = ?"; 
    $stmt = mysqli_prepare($conn, $sql);
    $userId = $_SESSION["user"]; 
    mysqli_stmt_bind_param($stmt, "di", $results, $userId);
    mysqli_stmt_execute($stmt);
}   
if(isset($_POST["weight"]) && isset($_POST["height"])){
    if ($results < 18.5) {
        $classify = "(Underweight)";
    } elseif ($results < 24.9) {
        $classify = "(Normal)";
    } elseif ($results < 29.9) {
        $classify = "(Overweight)";
    } else {
        $classify = "(Obesity)";
    }
}
?>