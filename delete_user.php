<?php 
    require "connect.php";

if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
$id=$_GET['email'];
$sql = "DELETE FROM Customer WHERE email='$id';";
// $query_customer = mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}
?>