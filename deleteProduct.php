<?php 
    require "connect.php";

if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql_favourite = "DELETE FROM Favourite WHERE id_product = '$id';";
$query_favourrite = mysqli_query($conn,$sql_favourite);
$sql = "DELETE FROM Product WHERE id_product='$id';";
$query_product = mysqli_query($conn,$sql);
 if($query_product){
     echo header ('Location : http://chucdong.com/Deliciousrice/WebQuanTri/listProduct.php ');
    
 }else {
   
 }
}
?>