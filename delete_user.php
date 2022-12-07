<?php 
    require "connect.php";

if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
$id=$_GET['email'];
$sql = "DELETE FROM Customer WHERE email='$id';";
if (mysqli_query($conn, $sql)) {
    echo "Xóa Thành Công";
  } else {
    echo "Lỗi Không Thành Công: " . mysqli_error($conn);
  }
}
?>