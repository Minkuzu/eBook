<?php include('partials-front/nav.php'); ?>

    <section class="search text-center">
        <div class="container">
            <?php 
                $search = $_POST['search'];
            ?>
            <h2>You searched for <a href="#">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>

    <section class="list">
        <div class="container">
            <h2 class="text-center">Book List</h2>

            <?php 
                $search = $_POST['search'];
                $sql = "SELECT * FROM tbl_book WHERE title LIKE '%$search%'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
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
                }
                else
                {
                    echo "No Books";
                }
            ?>
        </div>
    </section>


<?php include('partials-front/footer.php'); ?>