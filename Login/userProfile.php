<?php
session_start();
$email=$_SESSION['email'];
echo "Welcome"."<br>".$email;
?>
<div class="container">
    <div class="row">
        <div class="back">
        <a href="logout.php">Logout</a>
        </div>
    </div>
</div>