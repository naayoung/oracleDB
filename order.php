
<!DOCTYPE html>
<html lang="ko">
  <head>

    <style media="screen">
  .container h2{
    margin-left: 30px;
  }
  .customer_table,.delivery_address,.product_table{
    border-top: 2px solid #cecece;
margin-left: 30px;
border-collapse: collapse;
width: 100%;

  }
  table td.col2{
    border-bottom: 1px solid #e4e4e4;
    padding: 10px 16px;
    }
    table td.col1{
    width: 104px;
    border: solid #e4e4e4;
    border-spacing: 0;
    border-width: 0 1px 1px 0;
    padding: 7px 10px 7px 15px;
    background: #f4f4f4;
    }
    </style>
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
                <li class="active"><a href="#">Home</a></li>
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
/
    <!-- START THE FEATURETTES -->
    <div class="container marketing">
      <form class="order" action="http://localhost/order_finish.php" method="post">
<p> <h1>주문</h1> </p>


<p> <h2>구매자정보</h2> </p>
<p></p>
<table class="customer_table">




 <tr>
        <td class="col1">  구매자ID </td>
        <td class="col2"><input type="text" name="ID" value="" placeholder="ID"></td>
 </tr>

 <tr>
            <td class="col1">이름</td>
            <td class="col2">
              <input type="text" name="name" value="" placeholder="name">
            </td>
 </tr>

 <tr>
          <td class="col1">이메일 </td>
            <td class="col2"><input type="text" name="email" value="" placeholder="e-mail">   </td>
 </tr>
 <tr>
    <td class="col1">전화번호 </td>
    <td class="col2"><input type="text" name="pnumber" value="" placeholder="phone"> </td>
 </tr>
    </div>

</table>



<p> <h2>받는사람정보</h2> </p>
<table class="delivery_address">

  <tr>
    <td class="col1">이름</td>
    <td class="col2"><input type="text" name="name2" value="" placeholder="name">
  </tr>
  <tr>
        <td class="col1">  배송 주소 </td>
        <td class="col2"><input type="text" name="address" value="" placeholder="address"> </td>
  </tr>
  <tr>
        <td class="col1">  연락처</td>
        <td class="col2"> <input type="text" name="pnumber2" value="" placeholder="phone"> </td>
  </tr>
  <tr>
          <td class="col1">배송 <br>요청사항 </td>
          <td class="col2"><textarea cols="50" rows="2" placeholder="request"></textarea> </td>
  </tr>
</table>






<p> <h2>제품정보</h2> </p>

<table class="product_table">
<tr>
          <td class="col1">주문번호</td>
          <td class="col2"><input type="text" name="onumber" value="" placeholder="onumber">  </td>
</tr>
<tr>
  <td class="col1">수량</td>
  <td class="col2"> <input type="text" name="" value="" placeholder="000"> </td>
</tr>

<tr>
          <td class="col1">구분</td>
          <td class="col2"> <input type="text" name="" value="" placeholder="classify"> </td>
</tr>


</table>
<p  > <input  type="submit" name="submit" value="업로드" style="margin: 20px 50% 20px 50%"> </p>
      </form>

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
