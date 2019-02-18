<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//체크한 주문번호와 주문자의 폰번호를 받아와 delete문 실행
include("db_connect.php");
$order_num = $_POST['checkinfo'];
$Cus_phone = $_POST['cusphone'];
if($order_num == null){
	echo "<script>alert('취소할 주문을 선택해주세요.');</script>";
	echo "<script>history.back();</script>";
} else {
	for($i=0 ; $i < count($_POST['checkinfo']) ; $i++)
	{
		$query = "delete from PORDER where ORDER_NUMBER = '".$order_num[$i]."' and CUS_PHONE = '".$Cus_phone."'";
		$result = oci_parse($conn, $query);
		oci_execute($result);
		oci_free_statement($result);
	}
	oci_free_statement($result);
	oci_close($conn);
	echo "<script>alert('주문취소 완료.');</script>";
	echo "<script>location.href='./order_change.html';</script>";
}
?>