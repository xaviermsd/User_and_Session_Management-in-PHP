<?php
session_start();
session_destroy();
echo 
        "<script>
        alert('Lgout Successfully..!!!!');
        window.location.href='../login'; 
        </script>";

?>