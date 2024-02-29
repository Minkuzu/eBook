<?php include('partials-front/nav.php'); ?>

    <section class="search text-left">
        <div class="container">
            <form action="<?php echo SITEURL; ?>books-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for books..." required>
                <input type="submit" name="submit" value="Search" class="btn">
            </form>
        </div>
    </section>

    <section class="list">
        <div class="container">
            <h2 class="text-center">Book List</h2>

            <?php 
            $sql2 = "SELECT * FROM tbl_book WHERE active='yes'";
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
                    </div>
                    <div class = "fix"></div>
                    <?php
                }
            }else{
                echo "No book";
            }
            ?>
        </div>
    </section>

    <section class = "social">
        <div class = "container text-center">
            <ul>
                <li>
                    <a href="#"><img src="images/facebook.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="images/youtube.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="images/discord.png"/></a>
                </li>
            </ul>
        </div>
    </section>

    <?php include('partials-front/footer.php'); ?>