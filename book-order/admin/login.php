    <?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class = "login">
            <h1 class = "text-center">Login</h1>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['not-login']))
                {
                    echo $_SESSION['not-login'];
                    unset($_SESSION['not-login']);
                }
            ?>

            <form action="" method = "POST" class = "text-center">
                Username: <br>
                <input type="text" name="username"> <br><br>
                Password : <br>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Login" >
            </form>
        </div>

    </body>
</html>

<?php 
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $_SESSION['login'] = "<div class='text-center'>Login Successfully</div>";
            $_SESSION['user'] = $username; 
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='text-center'>Wrong username or password</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>
