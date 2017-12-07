﻿

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
              <a class="navbar-brand" href="index.html"><img height="30em" src="./favicon.png"></img> D.M.S.</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="order.html">Order</a></li>
                <li class="active"><a href="order_check.html">Check</a></li>
                <li><a href="order_change.html">Change</a></li>                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- START THE FEATURETTES -->
    <div class="container marketing">
      
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
      
      $order_number = $_POST["Delnumber"]; // 입력값
      //$str = "select * from PORDER where DEL_NUMBER = '.$order_number.'";
      //$result = oci_query($con, $str);
      
      $result = oci_parse($con, "select * from PORDER where DEL_NUMBER = '$order_number'"); //DB에 저장된 배송번호값
      oci_execute($result);
      $DEL_NUMBER = oci_parse($con, "select DEL_NUMBER from PORDER"); //DB에 저장된 배송번호값
      oci_execute($DEL_NUMBER);
      $CUS_NAME = oci_parse($con, "select CUS_NAME from CUSTOMER,PORDER where PORDER.CUS_PHONE = CUSTOMER.CUS_PHONE");
      oci_execute($CUS_NAME);
      $COM_NAME = oci_parse($con, "select * from COM_NAME");
      oci_execute($COM_NAME);
      $COM_PHONE = oci_parse($con, "select * from COM_NAME");
      oci_execute($COM_PHONE);
      $COM_ADDRESS = oci_parse($con, "select * from COM_ADDRESS");
      oci_execute($COM_ADDRESS);
      

      $row1 = oci_fetch_assoc($DEL_NUMBER);
      $row2 = oci_fetch_assoc($CUS_NAME);
      $row3 = oci_fetch_assoc($COM_NAME);
      $row4 = oci_fetch_assoc($COM_PHONE);
      $row5 = oci_fetch_assoc($COM_ADDRESS);

      
      oci_free_statement($order_number);
      oci_free_statement($DEL_NUMBER);
      oci_free_statement($CUS_NAME);
      oci_free_statement($COM_NAME);
      oci_free_statement($COM_PHONE);
      oci_free_statement($COM_ADDRESS);
      oci_close($con);
      
  ?> 
      <script>
      function check(){
        //Delnumber 양식체크
        //form1을 submit
        checkNotEmpty(document.getElementById('Delnumber'));
        checkNumeric(document.getElementById('Delnumber'));
      }
      var NY=document.getElementById('NY_Delivery').id;
      var Robert=document.getElementById('Robert_Delivery').id;

      if(<?=$order_number?>=/1{3}/) //숫자 1이 3개 있을때
        <?=$row3['COM_NAME']?> == NY_Delivery;
      else if(<?=$order_number?>=/3{3}/) //숫자 3이 3개 있을때
        <?=$row3['COM_NAME']?> == Robert_Delivery;
      else
        <?=$row3['COM_NAME']?> == SOO_Delivery;

      if( <?=$DEL_NUMBER?> == <?=$order_number?> ){
        document.write("<font size='5'> <?=$CUS_NAME?>님의 상품은 배송준비중입니다!♡</font></br></br>");
        document.write("<font size='5'> <strong><택배회사정보></strong></font></br></br>");
        document.write("<font size='4'> 택배업체명: <?=$row['COM_NAME']?></br>전화번호: <?=$row['COM_PHONE']?></br>주소: <?=$row['COM_ADDRESS']?></br></font></br></br>");
        if(<?=$row['COM_NAME']?> == NY)
          document.write("<img width='450' height='270' src='img/NY_Delivery.png'/></br></br>");       
        else if(<?=$row['COM_NAME']?> == Robert)
          document.write("<img width='450' height='270' src='img/Robert_Delivery.png'/></br></br>");
        else
          document.write("<img width='450' height='270' src='img/Soo_Delivery.png'/></br></br>");
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
      
      <form align="center" id="form1" method="post" target="order_check.php">
        <h2>배송번호를 입력해주세요</h2>
        <input type='text' id='Delnumber' name="Delnumber" required pattern="/^[0-9]+$/"/>
        <input type='submit' onClick="check()" value="검색"/>
	      <br></br>
	      <!--
        <img id="NY_Delivery" src="img/NY_Delivery.png" alt="Generic placeholder image" style="display:none" width="320" height="270"/>
	      -->
      </form>

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


