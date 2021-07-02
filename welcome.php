<!-- <?php
//session_start();
//echo 'Je bent ingelogd als ' . $_SESSION['logged_in_as'];

//?>


<html>
<a href="logout.php">Uitloggen</a>
</html> -->

<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset your password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign out of your account</a>
        <a href="post.php" class="btn btn-secondary ml-3">Create new post</a>
    </p>
</body>
</html>