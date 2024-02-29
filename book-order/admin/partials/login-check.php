<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['not-login'] = "<div class='text-center'>You're not login</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>