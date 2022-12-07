<?php 
    require "connect.php";

if(isset($_REQUEST['idStaff']) and $_REQUEST['idStaff']!=""){
$id=$_GET['idStaff'];
// $sql_detaild = "DELETE FROM Detailed_Invoice WHERE id_bill = '$id'";
// // $query_detaild = mysqli_query($conn,$sql_detaild);
// if (mysqli_query($conn, $sql_detaild)) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }
// $sql_bill = "DELETE FROM Bill WHERE id_bill = '$id'";
// // $query_bill = mysqli_query($conn,$sql_bill);
// if (mysqli_query($conn, $sql_bill)) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }
// $sql_billStaff = "DELETE FROM Bill WHERE id_staff = '$id'";
// // $query_bill_staff = mysqli_query($conn,$sql_billStaff);
// if (mysqli_query($conn, $sql_billStaff)) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }
$sql = "DELETE FROM Staff WHERE id_staff='$id';";
// $query_staff = mysqli_query($conn,$sql);
//  if($query_staff){
//      echo "Xóa thành công ";
//     //  echo header ('Location : http://chucdong.com/Deliciousrice/WebQuanTri/quanLyNhanVien.php ');
//  }else {
//   echo "Xóa không thanh công";
//  }
if (mysqli_query($conn, $sql)) {
  echo header ('Location : http://chucdong.com/Deliciousrice/WebQuanTri/quanLyNhanVien.php ');
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}
?>

