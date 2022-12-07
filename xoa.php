<?php
require "connect.php";
if(isset($_REQUEST['id_product']) and $_REQUEST['id_product']!=""){
$id=$_GET['id_product'];
$sql = "DELETE FROM Product WHERE id_product='$id';";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
echo header('Location: listProduct.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>