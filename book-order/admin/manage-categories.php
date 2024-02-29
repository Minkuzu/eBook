<?php include('partials/nav.php'); ?>

<div class = "main-content">
    <div class = "container text-center">
        <h1>Manage Categories</h1>
        <br><br>
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
            if(isset($_SESSION['no-categories']))
            {
                echo $_SESSION['no-categories'];
                unset($_SESSION['no-categories']);
            }   
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }          
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }  
            if(isset($_SESSION['remove-img']))
            {
                echo $_SESSION['remove-img'];
                unset($_SESSION['remove-img']);
            }  
            

        ?>
        <br><br>
        <table class = "tbl-all text-left">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Feature</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $category_id = 1;
                        if($count > 0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $image_name = $row['image_name'];
                                $title = $row['title'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <tr>
                                        <td><?php echo $category_id++; ?></td>
                                        <td>
                                            <?php 
                                                if($image_name!="")
                                                {
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "Image is not added";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href = "<?php echo SITEURL;?>admin/update-categories.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class = "btn-update">Update</a>
                                            <a href = "<?php echo SITEURL;?>admin/delete-categories.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class = "btn-delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else
                        {
                            ?>
                            <tr>
                                <td colspan="6">There is no Category</td>
                            </tr>
                            <?php 
                        }
                    ?>
            </table>
            <br>
            <a href="<?php echo SITEURL; ?>admin/add-categories.php" class = "btn-add">Add</a>
    </div>
</div>

<?php include('partials/footer.php'); ?>