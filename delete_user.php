<?php 
    require "connect.php";

if(isset($_REQUEST['id_customer']) and $_REQUEST['id_customer']!=""){
$id=$_GET['id_customer'];
$sql_fa = "DELETE FROM Favourite WHERE id_customer='$id';";
// $query_customer = mysqli_query($conn,$sql_fa);
if (mysqli_query($conn, $sql_fa)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
$sql_bill = "DELETE FROM Address WHERE id_customer='$id';";
// $query_customer = mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql_bill)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
$sql = "DELETE FROM Customer WHERE id_customer='$id';";
// $query_customer = mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}
?>