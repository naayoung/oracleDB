<?php
$con = oci_connect("B489059","B489059","203.249.87.162:1521/orcl");

     if(!$con){
       echo "Oricale Connect Error";
       exit();
     }
 ?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <style media="screen">
      .submit_dnumber{
        margin-top: 8em;
        text-align: center;
      }
      hr {
        padding-top: 25em;
      }
    </style>
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
  </head>

<?php

//customer 값입력
$CUS_PHONE = $_POST['pnumber'];
$CUS_NAME = $_POST['name'];
$EMAIL = $_POST['email'];

$stmt = oci_parse($con, "insert into CUSTOMER values ('".$CUS_PHONE."','".$CUS_NAME."','".$EMAIL."')");
oci_execute($stmt);
oci_commit($stmt);







$i= mt_rand(1,10000);
$j= mt_rand(1,10000);
$k= mt_rand(1,3);
//porder 값 입력
$ORDER_NUMBER = $i;
$DEL_NUMBER = $j;

$STATUS = 'Preparing';
$CUS_PHONE = $_POST['pnumber'];
$REC_NAME = $_POST['name2'];
$ADDRESS  = $_POST['address'];
$REC_PHONE = $_POST['pnumber2'];
$ETC = $_POST['etc'];

if($k ==1){
  $COM_NAME = 'NY_Delivery';
}
else if($k == 2){
  $COM_NAME = 'SOO_Delivery';
}
else{
  $COM_NAME = 'Robert_Delivery';
}
$stmt = oci_parse($con, "insert into DELIVERY values ('".$DEL_NUMBER."','".$STATUS."','".$COM_NAME."')");
oci_execute($stmt);
oci_commit($stmt);


$stmt = oci_parse($con, "insert into PORDER values ('".$ORDER_NUMBER."','".$REC_NAME."','".$ADDRESS."','".$REC_PHONE."','".$ETC."','".$DEL_NUMBER."','".$CUS_PHONE."')");
oci_execute($stmt);
oci_commit($stmt);




//product 값 입력
$PRO_NAME1 = $_POST['pro_name1'];
$QUANTITY1 = $_POST['quantity1'];
$PRO_NAME2 = $_POST['pro_name2'];
$QUANTITY2 = $_POST['quantity2'];
$PRO_NAME3 = $_POST['pro_name3'];
$QUANTITY3 = $_POST['quantity3'];

$stmt = oci_parse($con, "insert into PRODUCT values ('".$PRO_NAME1."','".$QUANTITY1."','".$ORDER_NUMBER."')");
oci_execute($stmt);
oci_commit($stmt);
$stmt = oci_parse($con, "insert into PRODUCT values ('".$PRO_NAME2."','".$QUANTITY2."','".$ORDER_NUMBER."')");
oci_execute($stmt);
oci_commit($stmt);
$stmt = oci_parse($con, "insert into PRODUCT values ('".$PRO_NAME3."','".$QUANTITY3."','".$ORDER_NUMBER."')");
oci_execute($stmt);
oci_commit($stmt);





oci_close($con);
 ?>





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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="order_check.php">Check</a></li>
                    <li><a href="order_change.html">Change</a></li>
                  </ul>
                </div>
              </div>
            </nav>

          </div>
        </div>

    <!-- START THE FEATURETTES -->
    <div class="container marketing">

      <form class="submit_dnumber" action="" method="post">
        <h1>주문 완료</h1>
        <br/>
        <h3> 배송번호 </h3> <!-- 배송번호 불러오기 -->
        <p class="lead"><?php echo $DEL_NUMBER;?></p>
      </form>
        <!-- /END THE FEATURETTES -->
        <!-- FOOTER -->
      <!-- FOOTER -->

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

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
