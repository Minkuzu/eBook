<?php include('partials-front/nav.php'); ?>

    <?php 
        if(isset($_GET['book_id']))
        {
            $book_id = $_GET['book_id'];
            $sql = "SELECT * FROM tbl_book WHERE id=$book_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }else{
                header('location:'.SITEURL);
            }
        }
        else{
            header('location:'.SITEURL);
        }
    ?>


    <section class="search">
        <div class="container">
            <h2 class="text-center">Confirm your order</h2>
            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Book</legend>
                    <div class="book-menu-img">
                        <?php 
                            if($image_name == "")
                            {
                                echo "Image is not added";
                            }else{
                                ?>
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="Novel" class="img-resolution">
                                <?php
                            }
                        
                        ?>
                    </div>
                    <div class="book-list-desc">
                        <h2><?php echo $title; ?></h2>
                        <input type="hidden" name="book" value="<?php echo $title; ?>">
                        <p1><?php echo $price; ?></p1>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="5" class="input-responsive" required></textarea>
                    <br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
            <?php 
                if(isset($_POST['submit']))
                {
                    $book = $_POST['book'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $order_date = date("Y-m-d h:i:sa");
                    $status = "Ordered";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $sql2 = "INSERT INTO tbl_order SET
                        book = '$book',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";
                    $res2 = mysqli_query($conn,$sql2);
                    if($res2==TRUE)
                    {
                        $_SESSION['order'] = "<div class = 'text-center'>Ordered Successfully</div>";
                        header('location:'.SITEURL);
                    }else{
                        $_SESSION['order'] = "Order Failed";
                        header('location:'.SITEURL);
                    }
                }
            ?>
        </div>
    </section>
    
<?php include('partials-front/footer.php'); ?>