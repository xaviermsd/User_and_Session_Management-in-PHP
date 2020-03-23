<?php
session_start();
$email=$_SESSION['email'];
echo "Welcome".$email;



?>