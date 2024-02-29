<?php include('../config/constants.php');
    include('login-check.php');
?>
<html>
    <head>
        <title>Book Order - Homepage</title>
        <link rel = "stylesheet" href = "../css/admin.css">
    </head>
    <body>
        <div class = "navbar">
            <div class = "container">
                <div class="logo">
                    <a href="#" title="Logo">
                        <img src="../images/logo.png" alt="Logo" class="img-responsive">
                    </a>
                </div>
                <div class = "nav text-right">
                    <ul>
                        <li><a href ="index.php">Home</a></li>
                        <li><a href ="manage-admin.php">Admin</a></li>
                        <li><a href ="manage-categories.php">Categories</a></li>
                        <li><a href ="manage-books.php">Books</a></li>
                        <li><a href ="manage-order.php">Order</a></li>
                        <li><a href="https://www.facebook.com/ZuyMinkNgu/" target="_blank">Contact</a></li>
                        <li><a href ="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>