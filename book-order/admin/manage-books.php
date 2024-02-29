<?php include('partials/nav.php'); ?>

<div class = "main-content">
    <div class = "container text-center">
        <h1>Manage Books</h1>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['remove-img']))
            {
                echo $_SESSION['remove-img'];
                unset($_SESSION['remove-img']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['upload2']))
            {
                echo $_SESSION['upload2'];
                unset($_SESSION['upload2']);
            }
        ?>
        <table class = "tbl-all text-left">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Number of pages</th>
                        <th>Publish date</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_book  
                        ";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $book_id = 1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $nop =  $row['nop'];
                                $pub_date = $row['pub_date'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                <tr>
                                    <td><?php echo $book_id++; ?></td>
                                    <td>
                                        <?php
                                            if($image_name=="")
                                            {
                                                echo "Image is not Added";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" width = "100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $nop; ?></td>
                                    <td><?php echo $pub_date; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href = "<?php echo SITEURL;?>admin/update-books.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class = "btn-update">Update</a>
                                        <a href = "<?php echo SITEURL;?>admin/delete-books.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class = "btn-delete">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <td colspan='7'>No book</td>;
                            <?php
                        }
                    ?>

                    
            </table>
            <br>
            <a href = "<?php echo SITEURL;?>admin/add-books.php" class = "btn-add">Add</a>
    </div>
</div>

<?php include('partials/footer.php'); ?>