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
$CUS_PHONE = oci_parse($con, "INSERT INTO CUSTOMER (CUS_PHONE) VALUES('".$_post['pnumber']."');");
       oci_execute($CUS_PHONE);
       $CUS_NAME = oci_parse($con, "INSERT INTO CUSTOMER (CUS_NAME) VALUES('".$_POST['name']."');");
       oci_execute($CUS_NAME);
       $EMAIL = oci_parse($con, "INSERT INTO CUSTOMER (EMAIL) VALUES('".$_POST['email']."');");
       oci_execute($EMAIL);
       $REC_NAME = oci_parse($con, "INSERT INTO PORDER (REC_NAME) VALUES('".$_POST['name2']."');");
       oci_execute($REC_NAME);
         $ADDRESS = oci_parse($con, "INSERT INTO PORDER (ADDRESS) VALUES('".$_POST['address']."');");
         oci_execute($ADDRESS);
         $REC_PHONE = oci_parse($con, "INSERT INTO PORDER (REC_PHONE) VALUES('".$_POST['pnumber2']."');");
        oci_execute($REC_PHONE);


$ETC = oci_parse($con, "INSERT INTO PORDER (ETC) VALUES('".$_POST[etc]."');");
       oci_execute($ETC);
       $PRO_NAME = oci_parse($con, "INSERT INTO PRODUCT (PRO_NAME) VALUES('".$_POST['pro_name']."');");
       oci_execute($PRO_NAME);
       $QUANTITY = oci_parse($con, "INSERT INTO PRODUCT (QUANTITY) VALUES('".$_POST['quantity']."');");
       oci_execute($QUANTITY);




oci_free_statement($parse);

oci_close($conn);
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
                  <a class="navbar-brand" href="index.html"><img height="30em" src="./favicon.png"></img> D.M.S.</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="order.html">Order</a></li>
                    <li><a href="order_check.html">Check</a></li>
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
        <p class="lead">8439223</p>
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
