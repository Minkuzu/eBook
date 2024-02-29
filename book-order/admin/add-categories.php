<?php include('partials/nav.php'); ?>

<div class = "main-content">
    <div class = "container text-center">
        <h1>Add Category</h1>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }      
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class = "btn-add">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "")
                    {
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                            if($upload==false)
                            {
                                $_SESSION['upload'] = "<div class='text-center'>Failed to upload image</div>";
                                header('location:'.SITEURL.'admin/add-categories.php');
                                die();
                            }  
                    }
                }
                else
                {
                    $image_name = "";
                }

                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";
                $res = mysqli_query($conn,$sql);
                if($res==TRUE)
                {
                    $_SESSION['add'] = "Added Successfully";
                    header("location:".SITEURL.'admin/manage-categories.php');
                }
                else{
                    $_SESSION['add'] = "Add Failed";
                    header("location:".SITEURL.'admin/add-categories.php');
                }
            }
        
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>