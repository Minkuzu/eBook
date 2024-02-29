<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Website</title>
</head>
<body>
    <section class = "navbar">
        <div class = "container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Logo" class="img-responsive">
                </a>
            </div>

            <div class = "nav text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>books.php">Books</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/ZuyMinkNgu/" target="_blank">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="fix"></div>
    </section>