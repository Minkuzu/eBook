<?php 
    include('../config/constants.php'); 
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../images/category/".$image_name;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['remove'] = "Failed to remove";
                header('location:'.SITEURL. 'admin/manage-categories.php');
                die();
            }
        }
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $_SESSION['delete'] = "Deleted Successfully";
            header('location:'.SITEURL.'admin/manage-categories.php');
        }else{
            $_SESSION['delete'] = "Delete Failed";
            header('location:'.SITEURL.'admin/manage-categories.php');
        }
    }
    else{
        header('location:'.SITEURL.'admin/manage-categories.php');
    }

?>