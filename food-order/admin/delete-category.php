<?php
   include('../config/constants.php');
   if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];
   if($image_name!="")
   {
     $path="../images/category/".$image_name;
     $remove=unlink($path);
     if($remove==false)
     {
      $_SESSION['remove']="<div class='error'>Failed to remove category image</div>";
      header("location:".SITEURL."admin/manage-category.php");
      die();
     }
   }
   $sql="DELETE FROM tbl_category WHERE id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==TRUE)
   {
    $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
    header("location:".SITEURL."admin/manage-category.php");
   }
   else
   {
    $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
    header("location:".SITEURL."admin/manage-category.php");
   }
  }
  else
  {
    $_SESSION['delete']="<div class='error'>Unauthorized Access</div>";
    header("location:".SITEURL."admin/manage-category.php");
  }
?>