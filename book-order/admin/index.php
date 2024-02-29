<?php include('partials/nav.php'); ?>
        <div class = "main-content">
            <div class = "container">
                <h1 class = "text-center">DASHBOARD</h1>

                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
                <div class = "col-3 text-center">
                    <?php 
                        $sql = "SELECT * FROM tbl_book";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    Books
                </div>

                <div class = "col-3 text-center">
                    <?php 
                        $sql2 = "SELECT * FROM tbl_category";
                        $res2 = mysqli_query($conn,$sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>
                    <h1><?php echo $count2; ?></h1>
                    <br>
                    Categories
                </div>

                <div class = "col-3 text-center">
                    <?php 
                        $sql3 = "SELECT * FROM tbl_order";
                        $res3 = mysqli_query($conn,$sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                    Orders
                </div>
                <div class = "fix">
            </div>
        </div>
<?php include('partials/footer.php'); ?>