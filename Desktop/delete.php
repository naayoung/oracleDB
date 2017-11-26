<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//table_name = goods
//column = order_number, product
include("pdb_connect.php");
$no = $_POST['checkinfo'];
for($i=0 ; $i < count($_POST['checkinfo']) ; $i++)
{
	$query = "delete from goods where no = '$no[$i]'";
	$result = mysqli_query($connect, $query);
}
echo "<script>alert('주문취소 완료.');</script>";
echo "<script>location.href='./order_change.html';</script>";
?>