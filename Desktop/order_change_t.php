<?php
include("pdb_connect.php");
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

    <title>Delivery Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Bootstrap Javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://googledrive.com/host/0B-QKv6rUoIcGeHd6VV9JczlHUjg"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
	<script>
		function up()
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
		function del()
		{
			document.getElementById('aa').setAttribute("action", "./delete.php");
			document.getElementById('aa').submit();
		}
	</script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">택배관리시스템</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="#active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- START THE FEATURETTES -->
    <div class="container marketing">
		<form id="aa" name="change" method="post">
		<table class='table table-hover'>
			<tr>
				<td></td>
				<td>주문자</td>
				<td>상품명</td>
				<td>수량</td>
			</tr>
        <?php
			$order_number = $_POST["order_number"];
			$query = "select * from goods where order_number = '$order_number'";
			$result = mysqli_query($connect, $query);
			
			for($i=0;$array = mysqli_fetch_array($result);$i++)
			{
				echo "
			<tr>
				<td><input type='checkbox' name='checkinfo[]' value='".$array['no']."'></td>
				<td>".
					$array['name']."
				</td>
				<td>".
					$array['product']."
				</td>
				<td>".
					$array['num']."
				</td>
			</tr>";
			}
			echo "</table>
			";
			echo "</form>
";
			$result = mysqli_query($connect, $query);
			$array = mysqli_fetch_array($result);
			if($array['order_number'] != $order_number) 
			{
				echo "<script>alert('존재하지 않는 주문번호입니다.');</script>";
				echo "<script>location.href='./order_change.html';</script>";
			}
		?>
        <button type="button" onclick="del();">삭제</button>
		<button type="button" onclick="up();">수정</button>
        <!-- /END THE FEATURETTES -->
        <hr class="featurette-divider">
        
        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017 Delivery Management System, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>


		