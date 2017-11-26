<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//table_name = goods
//column = order_number, product
include("pdb_connect.php");
$no = $_POST["no"];
$order_number = $_POST["order_number"];
$num = $_POST["num"];
//$new_order = $_POST["new"];
//$past_order = $_POST["past"];

/*if($past_order === null)
{
	$query_s = "select * from goods where order_number = '$order_number'";
	$result_s = mysqli_query($connect, $query_s);
	$row = mysqli_fetch_array($result_s);
	if($row)
	{
		$query = "insert into goods(order_number, product) values('$order_number', '$new_order')";
	} else {
		echo "<script>alert('존재하지 않는 주문번호입니다.');</script>";
		echo "<script>window.close();</script>";
	}
} else
{
	$query = "update goods set product = '$new_order' where order_number = '$order_number' and product = '$past_order'";
}

$result = mysqli_query($connect, $query);
*/
$query = "update goods set num = '$num' where order_number = '$order_number' and no = '$no'";
$result = mysqli_query($connect, $query);
if(mysqli_affected_rows($connect)){
	echo "<script>alert('주문이 정상적으로 수정되었습니다.');</script>";
	echo "<script>window.close();</script>";
} else {
	echo "<script>alert('주문 수정 중 오류가 발생하였습니다.');</script>";
	echo "<script>window.close();</script>";
}
?>