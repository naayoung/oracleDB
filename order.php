<!DOCTYPE html>
<html lang="ko">
  <head>
    <style media="screen">
      .order {
        margin-top: 8em;
      }
      .customer_table,.delivery_address,.product_table{
        border-top: 2px solid #cecece;
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
                        <li class="active"><a href="order.php">Order</a></li>
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
      <form class="order" action="http://cic.hongik.ac.kr/a_team/a_team7/order_finish.php" method="post">

        <p> <h1>주문</h1> </p>
        <p> <h2>구매자정보</h2> </p>
        <p></p>
        <table class="customer_table">
          <tr>
            <td class="col1">이름</td>
            <td class="col2">
              <input type="text" name="name" value="" >
            </td>
          </tr>
          <tr>
            <td class="col1">이메일 </td>
            <td class="col2"><input type="text" name="email" value="" >   </td>
          </tr>
          <tr>
              <td class="col1">전화번호 </td>
              <td class="col2"><input type="text" name="pnumber" value="" > </td>
          </tr>
        </table>

        <p> <h2>받는사람정보</h2> </p>
        <table class="delivery_address">
          <tr>
            <td class="col1">이름</td>
            <td class="col2"><input type="text" name="name2" value="" >
          </tr>
          <tr>
            <td class="col1">  배송 주소 </td>
            <td class="col2"><input type="text" name="address" value="" > </td>
          </tr>
          <tr>
            <td class="col1">  연락처</td>
            <td class="col2"> <input type="text" name="pnumber2" value=""> </td>
          </tr>
          <tr>
            <td class="col1">배송 <br>요청사항 </td>
            <td class="col2"><textarea  name="etc" cols="50" rows="2" ></textarea> </td>
          </tr>
        </table>

        <p> <h2>제품정보</h2> </p>
        <table class="product_table" id="product">
          <tr>
            <td class="col1">제품이름</td>
            <td class="col2">
              <input type="text" name="pro_name" value="" >
              <button type="button" class="btn btn-default" onclick="button1_click();">추가</button>
            </td>
            <td class="col1">수량</td>
            <td class="col2">
              <input type="text" name="quantity" value="" >
            </td>
          </tr>
        </table>

        <p> <button type="submit" class="btn btn-success" style="margin: 20px 50% 20px 50%">완료</button> </p>

      </form>

      <!-- /END THE FEATURETTES -->
      <hr class="featurette-divider">

        <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Delivery Management System &middot; <a href="#">Privacy</a></p>
      </footer>
    </div><!-- /.container -->


    <script>
        function button1_click() {
          var table = document.getElementById("product");
          var oRow = table.insertRow();
          oRow.onmouseover=function(){table.clickedRowIndex=this.rowIndex}; //clickedRowIndex - 클릭한 Row의 위치를 확인;
          var oCell = oRow.insertCell();

          //삽입될 Form Tag
          var frmTag = "<tr><td class='col1'>제품이름</td><td class='col2'><input type='text' name='onumber' >";
          frmTag += "<button type='button' class='btn btn-default' onclick='button1_click();'>추가</button>'</td></tr>";
          frmTag += "<tr><td class='col1'>수량</td><td class='col2'><input type='text' ></td></tr>";
          oRow.innerHTML = frmTag;
        }
      </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
