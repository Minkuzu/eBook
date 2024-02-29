<?php include('partials-front/nav.php'); ?>

    <section class = "search">
        <div class = "container">
            <form action="<?php echo SITEURL; ?>books-search.php" method ="POST">
                <input type="search" name="search" placeholder="Search for books...">
                <input type="submit" name="submit" value="Search" class="btn">
            </form>
        </div>
    </section>

    <?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <section class = "categories">
        <div class = "container">
            <h1 class ="text-center">Trending Book Type</h1>

            <?php 
                $sql = "SELECT * FROM tbl_category WHERE active ='Yes' && featured ='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-books.php?category_id=<?php echo $id; ?>">
                            <div class = "book-type">
                                <h3 class = "book-type-title"><?php echo $title; ?><h3>
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "Image is not added";
                                    }
                                    else
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="">
                                    <?php 
                                ?>
                            </div>
                        </a>
                        <?php
                    }
                }
                else{
                    echo "No Category";
                }
            ?>
            <div class="fix"></div>
        </div>
    </section>

    <section class = "list">
        <div class = "container">
            <h1 class = "text-center">Trending Books</h1>

            <?php 
            $sql2 = "SELECT * FROM tbl_book WHERE active='yes' AND featured='Yes' LIMIT 3";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?> 
                    <a href="<?php echo SITEURL; ?>books-detail.php?book_id=<?php echo $id; ?>">
                    <div class="book-list">
                        <div class = "book-list-img">
                            <?php
                            if($image_name=="")
                            {
                                echo "Image is not added";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="Novel book 1">
                                <?php
                            }

                            ?>
                        </div>
                        <div class = "book-list-desc">
                            <h2><?php echo $title; ?></h2>
                            <br>
                            <p1><?php echo $price; ?></p1>
                            <br>
                            <p1><?php echo $description; ?></p1>  
                            <br>
                            <br>
                            <a href="<?php echo SITEURL; ?>order.php?book_id=<?php echo $id; ?>" class = "btn btn-order">Order</a>
                        </div>
                        <div class = "fix"></div>
                    </div>
                    <?php
                }
            }else{
                echo "No book";
            }
            ?>
            <div class = "fix"></div>
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>