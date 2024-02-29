<?php include('partials/nav.php'); ?>
<div class = "main-content">
    <div class = "container text-center">
        <h1>Add Books</h1>

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
            <table class = "tbl-30" >
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>   
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>   
                <tr>
                    <td>Select image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Categories: </td>
                    <td>
                        <select name="category">
                            <?php $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                    <option value="0">No category</option>
                                <?php
                            }
                            ?>  
                        </select>
                    </td>
                </tr>   
                <tr>
                    <td>Number of pages: </td>
                    <td>
                        <input type="number" name="nop">
                    </td>
                </tr>
                <tr>
                    <td>Publish date: </td>
                    <td>
                        <input type="date" name="pub_date">
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
                        <input type="submit" name="submit" value="Add Book" class="btn-add">
                    </td>
                </tr>      
            </table>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $nop = $_POST['nop'];
                $pub_date = $_POST['pub_date'];
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
                else{
                    $active = "No";
                }
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        /*$ext = end(explode('.', $image_name));
                        $image_name = "Book_Name_".rand(000,999).".".$ext;*/
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/book/".$image_name;
                        $upload = move_uploaded_file($src, $dst);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Failed to upload image"; 
                            header('location:'.SITEURL.'admin/add-books.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = "";
                }
                $sql2 = "INSERT INTO tbl_book SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    nop = $nop,
                    pub_date = '$pub_date',
                    featured = '$featured',
                    active = '$active'
                ";
                $res2 = mysqli_query($conn, $sql2);
                if($res2==TRUE)
                {
                    $_SESSION['add'] = "Added Successfully";
                    header('location:'.SITEURL.'admin/manage-books.php');
                }
                else
                {
                    $_SESSION['add'] = "Add Failed";
                    header('location:'.SITEURL.'admin/add-books.php');
                }   
            }
        ?>

    </div>
</div>
<?php include('partials/footer.php'); ?>