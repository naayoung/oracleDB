<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("db_connect.php");
//넘어온 파라미터 받기
$name = $_POST["name"];
$address = $_POST["add"];
$phone = $_POST["phone"];
$order_num = $_POST["order_num"];
$num = $_POST["num"];

//null값이 아닌 파라미터를 이용하여 주문수정
if($name != null){
	$query = "update PORDER set REC_NAME = '".$name."' where ORDER_NUMBER = '".$order_num."'";
	$result = oci_parse($conn, $query);
	oci_execute($result);
}
if($address != null){
	$query = "update PORDER set ADDRESS = '".$address."' where ORDER_NUMBER = '".$order_num."'";
	$result = oci_parse($conn, $query);
	oci_execute($result);
}
if($phone != null){
	$query = "update PORDER set REC_PHONE = '".$phone."' where ORDER_NUMBER = '".$order_num."'";
	$result = oci_parse($conn, $query);
	oci_execute($result);
}
if($num != null){
	$query = "update PRODUCT set QUANTITY = '".$num."' where ORDER_NUMBER = '".$order_num."'";
	$result = oci_parse($conn, $query);
	oci_execute($result);
}
//디비의 수정된 row값을 이용해 오류출력
if(oci_num_rows($result)){
	oci_free_statement($result);
	oci_close($conn);
	echo "<script>alert('주문이 정상적으로 수정되었습니다.');</script>";
	echo "<script>window.close();</script>";
} else {
	oci_free_statement($result);
	oci_close($conn);
	echo "<script>alert('주문 수정 중 오류가 발생하였습니다.');</script>";
	echo "<script>window.close();</script>";
}
?>