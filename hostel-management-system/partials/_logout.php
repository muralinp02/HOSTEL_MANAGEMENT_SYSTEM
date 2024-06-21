<?php
session_start();
unset($_SESSION["adminloggedin"]);
unset($_SESSION["adminusername"]);
unset($_SESSION["adminuserId"]);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
