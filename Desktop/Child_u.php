<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Update</title>
</head>
<body>
<?php
$index = $_GET["index"];
	echo "

		<br>
		<b><font size='5' color='#7E6ECD'>주문변경</font></b>
		<br><br>
		<form method='post' name='update' action='update.php'>
			<p>주문번호 : <input type='text' name='order_number'/></p>
			<p>변경할 수량 : <input type='text' name='num'/></p>
			<input type='hidden' value='".$index."' name='no'/>
			<input type='submit' value='수정'/>
		</form>
		<input type='button' value='창닫기' onclick='window.close()'>
	</body>
	</html>";
?>
