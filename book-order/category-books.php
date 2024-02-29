<?php include('partials-front/nav.php'); ?>

<?php 
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }
?>

    <section class="search text-center">
        <div class="container">
            <h2>Books on <a href="#">"<?php echo $category_title; ?>"</a></h2>
        </div>
    </section>

    <section class="list">
        <div class="container">

            <?php 
                $sql2 = "SELECT * FROM tbl_book WHERE category_id=$category_id";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2 > 0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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
                    echo "No Books";
                }
            ?>
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>