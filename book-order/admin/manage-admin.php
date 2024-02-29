<?php include('partials/nav.php'); ?>
        <div class = "main-content">
            <div class = "container text-center">
                <h1>Admin</h1>
                <br>
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
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
                    if(isset($_SESSION['pass-not-match']))
                    {
                        echo $_SESSION['pass-not-match'];
                        unset($_SESSION['pass-not-match']);
                    } 
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }  
                    if(isset($_SESSION['pass-change']))
                    {
                        echo $_SESSION['pass-change'];
                        unset($_SESSION['pass-change']);
                    }   
                ?>
                <br>
                <table class = "tbl-all text-left">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn,$sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);
                            $website_id=1;
                            if($count > 0)
                            {
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                    ?>

                                    <tr>
                                        <td><?php echo $website_id++;?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href = "<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class = "btn-password">Change Password</a>
                                            <a href = "<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class = "btn-update">Update</a>
                                            <a href = "<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class = "btn-delete">Delete</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }else{
                                ?>
                                <td colspan='7'>No Admin</td>;
                                <?php
                            }
                        }
                    ?>

                </table>
                <br>
                <a href = "add-admin.php" class = "btn-add">Add</a>
            </div>
        </div>
<?php include('partials/footer.php'); ?>