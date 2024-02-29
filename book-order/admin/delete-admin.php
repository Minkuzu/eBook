<?php 
    include('../config/constants.php'); 
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $_SESSION['delete'] = "Deleted Successfully";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
        $_SESSION['delete'] = "Delete Failed";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>