<?php
include 'database.php';
$db = new Database();
$db->create_admin();
$db->create_default();


?>