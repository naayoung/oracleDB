

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

    <!-- CSS -->
    <link rel="icon" href="./favicon.png">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="css/carousel.css" rel="stylesheet">

    <!-- Bootstrap Javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://googledrive.com/host/0B-QKv6rUoIcGeHd6VV9JczlHUjg"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <style>
    h2 {
      margin-top: 8em;
      }
    .featurette-divider {
      margin-top: 26em;
    }
    </style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
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
                <li class="active"><a href="order_check.php">Check</a></li>
                <li><a href="order_change.html">Change</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- START THE FEATURETTES -->
    <div class="container marketing">

      <script>
      function check(){
        //Delnumber 양식체크
        //form1을 submit

	       checkNotEmpty(document.getElementById('Delnumber'));
	       checkNumeric(document.getElementById('Delnumber'));
      }

      function checkNotEmpty(field){
        if(field.value.length==0){
          alert("배송번호를 입력해주세요!!");
          field.focus();
          return false;
        }
        return true;
      }
      function checkNumeric(elem, msg){
        var exp=/^[0-9]+$/;
        if(elem.value.match(exp)){
          return true;
        }else{
          alert("숫자만 입력해주세요!!");
          elem.focus();
          return false;
        }
      }
      </script>

      <form align="center" id="form1" method="post" >
        <h2>배송번호를 입력해주세요</h2>
        <input type='text' id='Delnumber' name="Delnumber" />
        <input type='submit' onClick="check()" value="검색"/>
	      <br></br>
      </form>

      <?php
          //POST값 받은게 없으면
          //  php 코드 수행 안함
          // 입력폼 출력
          //받은게 있으면(Dnumber)
          //  받은 값을 변수에 저장
          //  DB접속해서 조회
          //  매치가 되는지 체크
          //  매치가 되면 '배송준비중' 정보없음 문장 출력


            $con = oci_connect("B489059","B489059","203.249.87.162:1521/orcl");

            if(!$con){
              echo "Oricale Connect Error";
              exit();
            }

            $order_number = $_POST["Delnumber"];

            $query = "select * from DELIVERY where DEL_NUMBER = '".$order_number."'";
            $result = oci_parse($con,$query);
            oci_execute($result);
            //$row_num = oci_fetch_all($result, $row);
            $array = oci_fetch_assoc($result);

            $CUS_NAME = oci_parse($con, "select CUSTOMER.CUS_NAME FROM CUSTOMER WHERE CUSTOMER.CUS_PHONE
            IN (SELECT PORDER.CUS_PHONE FROM PORDER WHERE PORDER.DEL_NUMBER
            IN(SELECT DEL_NUMBER FROM DELIVERY WHERE DEL_NUMBER = '".$order_number."')) ");
            oci_execute($CUS_NAME);
            $row_num = oci_fetch_all($CUS_NAME, $row);

            $COM_NAME = oci_parse($con, "select COM_NAME from DELIVERY where DEL_NUMBER =  '".$order_number."' ");
            oci_execute($COM_NAME);
            $row_num2 = oci_fetch_all($COM_NAME, $row2);

            //$COM_PHONE = oci_parse($con, "select COM_PHONE from COMPANY where COM_NAME IN (SELECT COM_NAME FROM DELIVERY WHERE DEL_NUMBER =  '".$order_number."' ");
            $COM_PHONE = oci_parse($con, "select COM_PHONE from COMPANY,DELIVERY where DELIVERY.COM_NAME = COMPANY.COM_NAME AND DEL_NUMBER = '".$order_number."' ");
            oci_execute($COM_PHONE);
            $row_num3 = oci_fetch_all($COM_PHONE, $row3);

            $COM_ADDRESS = oci_parse($con, "select COM_ADDRESS from COMPANY,DELIVERY where DELIVERY.COM_NAME = COMPANY.COM_NAME AND DEL_NUMBER = '".$order_number."' ");
            oci_execute($COM_ADDRESS);
            $row_num4 = oci_fetch_all($COM_ADDRESS, $row4);

            $STATUS = oci_parse($con, "select STATUS from DELIVERY where DEL_NUMBER = '".$order_number."' ");
            oci_execute($STATUS);
            $row_num5 = oci_fetch_all($STATUS, $row5);

            $COMPANY = oci_parse($con, "select COM_NAME from DELIVERY WHERE DEL_NUMBER = '".$order_number."' ");
            oci_execute($COMPANY);
            $row_num6 = oci_fetch_all($COMPANY, $row6);

            if($array['DEL_NUMBER'] != $order_number){
              echo "<script>alert('잘못된 배송번호입니다.');</script>";
            }
            if($row6['COM_NAME'][0] == 'NY_Delivery' )
            {
              echo "<hr><hr><hr></hr></hr></hr> ";
              echo "<center><font size='5'> ".$row["CUS_NAME"][0]."님의 상품은 ".$row5["STATUS"][0]." 입니다!♡</font></center></br></br> ";
              echo "<center><font size='5'> <strong><택배회사정보></strong></font></center></br></br>";
              echo "<center><font size='4'> 택배업체명: ".$row2["COM_NAME"][0]." </br>전화번호: ".$row3["COM_PHONE"][0]."</br>
              주소: ".$row4["COM_ADDRESS"][0]."</br></font></center></br></br>";
              echo "<center><img width='450' height='270' src='img/NY_Delivery.png'/></center></br></br>";
            }
            else if($row6['COM_NAME'][0] == 'Robert_Delivery')
            {
              echo "<hr><hr><hr></hr></hr></hr> ";
              echo "<center><font size='5'> ".$row["CUS_NAME"][0]."님의 상품은 ".$row5["STATUS"][0]." 입니다!♡</font></center></br></br> ";
              echo "<center><font size='5'> <strong><택배회사정보></strong></font></center></br></br>";
              echo "<center><font size='4'> 택배업체명: ".$row2["COM_NAME"][0]." </br>전화번호: ".$row3["COM_PHONE"][0]."</br>
              주소: ".$row4["COM_ADDRESS"][0]."</br></font></center></br></br>";
              echo "<center><img width='450' height='270' src='img/Robert_Delivery.png'/></center></br></br> ";
            }
            else if($row6['COM_NAME'][0] == 'SOO_Delivery')
            {
              echo "<hr><hr><hr></hr></hr></hr> ";
              echo "<center><font size='5'> ".$row["CUS_NAME"][0]."님의 상품은 ".$row5["STATUS"][0]." 입니다!♡</font></center></br></br> ";
              echo "<center><font size='5'> <strong><택배회사정보></strong></font></center></br></br>";
              echo "<center><font size='4'> 택배업체명: ".$row2["COM_NAME"][0]." </br>전화번호: ".$row3["COM_PHONE"][0]."</br>
              주소: ".$row4["COM_ADDRESS"][0]."</br></font></center></br></br>";
              echo "<center><img width='450' height='270' src='img/Soo_Delivery.PNG'/></center></br></br>  ";
            }

            oci_free_statement($result);
            oci_free_statement($COM_NAME);
            oci_free_statement($COM_PHONE);
            oci_free_statement($COM_ADDRESS);
            oci_free_statement($CUS_NAME);
            oci_close($con);
      ?>

        <!-- /END THE FEATURETTES -->
        <hr class="featurette-divider">

        <!-- FOOTER -->
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; 2017 Delivery Management System &middot; <a href="#">Privacy</a></p>
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
