<?php 
    require "connect.php";
    // xoa nhân viên 
if(isset($_REQUEST['idStaff']) and $_REQUEST['idStaff']!=""){
$id=$_GET['idStaff'];
$sql = "DELETE FROM Staff WHERE id_staff='$id';";
if (mysqli_query($conn, $sql)) {
  echo header ('Location : http://chucdong.com/Deliciousrice/WebQuanTri/quanLyNhanVien.php ');
  echo "Xóa Thành Công";
} else {
  echo "Lỗi, Xóa Không Thành Công: " . mysqli_error($conn);
}
}
?>

