<?php
include("db_connect.php");

$Cus_phone = $_POST["Cus_phone"];//폰번호 받아오기
if($Cus_phone == null){
	echo "<script>alert('핸드폰 번호를 입력해주세요.');</script>";
	echo "<script>history.back();</script>";
}
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.png">
	<link href="css/carousel.css" rel="stylesheet">
    <title>Delivery Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Bootstrap Javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://googledrive.com/host/0B-QKv6rUoIcGeHd6VV9JczlHUjg"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>

	<script>
		function up() //체크한 주문번호 get방식으로 보내기, 주문수정용 팝업창 키기(주문수정시 체크는 하나만 가능)
        {
			var index;
			var size = document.getElementsByName("checkinfo[]").length;
			for(var i = 0; i < size; i++){
				if(document.getElementsByName("checkinfo[]")[i].checked == true){
					index = document.getElementsByName("checkinfo[]")[i].value;
				}
			}
            window.name = "update";
			var OpenCW = "Child_u.php?index=" + index;
            OpenWin = window.open(OpenCW, "Update", "width=570, height=350, resizable = no, scrollbars = no");    
        }
		function del() //체크한 주문목록 삭제(중복선택가능)
		{
			document.getElementById('aa').setAttribute("action", "./delete.php");
			document.getElementById('aa').submit();
		}
	</script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper" style="left:-1.3%;">
      <div class="container">
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img height="30em" src="./favicon.png"></img> D.M.S.</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="order_check.php">Check</a></li>
                <li class="active"><a href="order_change.html">Change</a></li>                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- START THE FEATURETTES -->
    <div class="container marketing" style="position: absolute; top: 100px; left:49.4%; transform:translateX(-50%);">
		<form id="aa" align="center" name="change" method="post">
		<table class='table table-hover'>
			<tr>
				<td></td>
				<td>받는분</td>
				<td>배송번호</td>
				<td>배송지 주소</td>
				<td>받는분 연락처</td>
				<td>상품명</td>
				<td>수 량</td>
				<td>배송요청사항</td>
			</tr>
        <?php
			
			//폰번호와 주문번호를 이용해 주문테이블과 제품테이블의 모든 컬럼값 가져오기
			$query = "select * from PORDER,PRODUCT where PORDER.CUS_PHONE = '$Cus_phone' and PORDER.ORDER_NUMBER = PRODUCT.ORDER_NUMBER";
			$result_All = oci_parse($conn, $query);
			oci_execute($result_All);
			
			//폰번호를 이용하여 회원의 주문목록 출력
			//체크박스 값을 중복으로 넘기기 위해 배열형식 사용
			for($i=0;$nrows = oci_fetch_assoc($result_All); $i++){
				//foreach($res as $item){
				echo "
			<tr>
				<td><input type='checkbox' name='checkinfo[]' value='".$nrows['ORDER_NUMBER']."'></td>
				<td>".
					$nrows['REC_NAME']."
				</td>
				<td>".
					$nrows['DEL_NUMBER']."
				</td>
				<td>".
					$nrows['ADDRESS']."
				</td>
				<td>".
					$nrows['REC_PHONE']."
				</td>
				<td>".
					$nrows['PRO_NAME']."
				</td>
				<td>".
					$nrows['QUANTITY']."
				</td>
				<td>".
					$nrows['ETC']."
				</td>
			</tr>";
			}
			
			echo "</table>
			";
			echo "<input type='hidden' name='cusphone' value='".$Cus_phone."'/>";
			echo "</form>
";			//폰번호 존재유무 확인
			$query = "select CUS_PHONE from CUSTOMER where CUS_PHONE = '$Cus_phone'";
			$result = oci_parse($conn, $query);
			oci_execute($result);
			$array = oci_fetch_assoc($result);
			if($array['CUS_PHONE'] != $Cus_phone) 
			{
				oci_free_statement($result);
				oci_close($conn);
				echo "<script>alert('존재하지 않는 번호입니다.');</script>";
				echo "<script>history.back();</script>";
			}
			oci_free_statement($result_All);
			oci_free_statement($result);
			oci_close($conn);
		?>
        <button type="button" onclick="del();">취소</button>
		<button type="button" onclick="up();">수정</button>
		
        <!-- /END THE FEATURETTES -->
        <hr class="featurette-divider">
        
        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017 Delivery Management System, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="vendor/holder.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>


		
