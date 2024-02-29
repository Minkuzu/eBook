<?php include('partials-front/nav.php'); ?>

    <section class = "categories">
        <div class = "container">
            <h1 class ="text-center">What types of book you enjoy ?</h1>
                <?php 
                    $sql = "SELECT * FROM tbl_category WHERE active ='Yes'";
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
            </div>
            </a>    
            <div class="fix"></div>
        </div>
    </section>
    
<?php include('partials-front/footer.php'); ?>