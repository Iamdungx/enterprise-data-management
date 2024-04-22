<?php
require 'connect_database.php';
session_start();

// Destroy the session
session_unset();
session_destroy();
session_regenerate_id(true);

// Redirect to the login page
header("location: index.php");
exit();
?>
