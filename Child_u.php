<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Update</title>
</head>
<body>
<?php
//get방식으로 넘어온 주문번호 받고 주문수정용 입력칸 출력
//hidden형식으로 주문번호 전송
$order_num = $_GET["index"];
	echo "

		<br>
		<b><font size='5' color='#7E6ECD'>주문변경</font></b>
		<br><br>
		<form method='post' name='update' action='update.php'>
			<p>받는분 : <input type='text' name='name'/></p>
			<p>배송지 주소 : <input type='text' name='add'/></p>
			<p>받는분 연락처 : <input type='text' name='phone'/></p>
			<p>변경할 수량 : <input type='text' name='num'/></p>
			<input type='hidden' value='".$order_num."' name='order_num'/>
			<input type='submit' value='수정'/>
		</form>
		<input type='button' value='창닫기' onclick='window.close()'>
	</body>
	</html>";
?>
