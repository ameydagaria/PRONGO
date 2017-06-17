<?php
 session_start();
 unset($_SESSION['login']);
 unset($_session['email']);
 unset($_session['name']);
 session_destroy();
 header("Location: login.php");
?>