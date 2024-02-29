<?php include('partials/nav.php'); ?>

<div class = "main-content">
    <div class = "container text-center">
        <h1>Manage Order</h1>

        <?php 
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <table class = "tbl-all text-left">
                    <tr>
                        <th>ID</th>
                        <th>Book title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    
                    <?php 
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                        $order_id = 1;
                        if($count>0)
                        {   
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $book = $row['book'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                ?>

                                    <tr>
                                        <td><?php echo $order_id++; ?></td>
                                        <td><?php echo $book; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href = "<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class = "btn-update">Update</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else{
                            echo "<tr><td colspan ='12' class = 'text-center'>There is no order</td></tr>";
                        }
                    ?>
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>