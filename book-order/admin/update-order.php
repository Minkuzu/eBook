<?php include('partials/nav.php'); ?>

<div class = "main-content">
    <div class = "container text-center">
        <h1>Update Order</h1>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_order WhERE id=$id";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);   
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
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
                }
            }
            else{
                header("location:".SITEURL.'admin/manage-order.php');
            }
        ?>

        <form action="" method = "POST">
            <table>
                <tr>
                    <td>Book Title: </td>
                    <td><?php echo $book; ?></td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td><?php echo $price; ?></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td>
                        <input type="number" name="qty" value ="<?php echo $qty?>">
                    </td>
                </tr>
                <tr>
                    <td>Total: </td>
                    <td><?php echo $total; ?></td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td><?php echo $order_date?></td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="customer_name" value ="<?php echo $customer_name?>">
                    </td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="customer_contact" value ="<?php echo $customer_contact?>">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="customer_email" value ="<?php echo $customer_email?>">
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="customer_address" value ="<?php echo $customer_address?>">
                    </td>
                </tr>
                <tr>
                    <td colspan = "12">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" name="submit" value="Update Order" class = "btn-update">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php 
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $status = $_POST['status'];
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            $sql2 = "UPDATE tbl_order SET
                    price = $price,
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id= '$id'
                ";
                $res2 = mysqli_query($conn,$sql2);
                if($res2==TRUE)
                {
                    $_SESSION['update'] = "Updated Sucessfully";
                    header("location:".SITEURL.'admin/manage-order.php');
                }else{
                    $_SESSION['update'] = "Update Failed";
                    header("location:".SITEURL.'admin/manage-order.php');
                }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>