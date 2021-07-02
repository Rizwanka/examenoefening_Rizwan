<!-- <?php
session_start();
unset($_SESSION['logged_in_as']);
unset($_SESSION['is_admin']);
header('Location: index.php');?> -->

<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>