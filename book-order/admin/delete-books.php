<?php include('partials/nav.php');?>

<?php 
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../images/book/".$image_name;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['remove'] = "Failed to remove";
                header('location:'.SITEURL.'admin/manage-books.php');
                die();
            }
        }
    

        $sql = "DELETE FROM tbl_book WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $_SESSION['delete'] = "Deleted Successfuly";
            header('location:'.SITEURL.'admin/manage-books.php');
        }
        else
        {
            $_SESSION['delete'] = "Delete Failed";
            header('location:'.SITEURL.'admin/manage-books.php');
        }
    }   
    else
    {
        header('location:'.SITEURL.'admin/manage-books.php');
    }
?>


<?php include('partials/footer.php');?>