<?php 
    session_start();
    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id,email,passwor FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $user = null;
        if(count($results) > 0){
            $user = $results;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to you app</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style2.css">
</head>
<body>

 <?php require '../CSS/header.php' ?>


    <?php if(!empty($user)): ?>
        <br>Welcome. <?= $user['email'] ?>

    <br>You ARE Successfully Logged In
    <a href="logout.php">LogOut</a> 
    <?php else: ?>



<h1>Please login or SignUp</h1>

<a href="login.php">Login</a>or 
<a href="signup.php">Sign Up</a>
    <?php endif; ?>
    
</body>
</html>