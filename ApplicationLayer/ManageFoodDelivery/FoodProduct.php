<?php
session_start();

require_once '../../BusinessServicesLayer/foodController/foodController.php';

$food = new foodController();
$sp_id= $_SESSION["id"];

if(!isset($_SESSION["loggedin"])){
  header("location: ../../ApplicationLayer/Home/Homepage.php");
  exit;
}

if(isset($_POST['delete'])){
  $food->food_deleteProduct($sp_id);   
}

if(isset($_POST['getData'])){
  $output = $food->food_showData($sp_id);
  echo $output;
  exit;
}

?>
<html>
<head>
  <title>Food Product</title>
  <link href="../../css/design.css" rel="stylesheet">
</head>
<body bgcolor="#ccd9ff">
  <table id="top" height="9%" width="100%">
    <tr>
      <th align="left" height="5%" valign="top" width="25%"> <img src="../../images/GUIImages/courier.png" width="25" height="25"> Speeda</th>
      <th align="center" colspan="2" width="50%"> 100% Guaranteed Dispatch </th>
      <th align="right"> <button type="button" id="sp_button" style="border:transparent;background:none;">
                <img src="../../images/GUIImages/user.png" style="width:20px;height:20px;border:0"/></button> 
      </th>

      <div class="sp_form">
        <form action="/action_page.php" class="form-container">
          <a href="../ManageUser/SPProfile.php"> <img src="../../images/GUIImages/gear.png" style="width:20px;border:0;vertical-align: middle;"/> My Account </a> <br>
          <a href="../ManageUser/SPManageProduct.php"> <img src="../../images/GUIImages/finger.png" style="width:20px;border:0;vertical-align: middle;"/> Manage Product </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPOrderList.php"> <img src="../../images/GUIImages/order.png" style="width:20px;border:0;vertical-align: middle;"/> Order List </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPTrackOrder.php"> <img src="../../images/GUIImages/road.png" style="width:20px;border:0;vertical-align: middle;"/> Track Order </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPReport.php"> <img src="../../images/GUIImages/summary.png" style="width:20px;border:0;vertical-align: middle;"/> My Report</a> <br>
          <a href="../ManageUser/Logout.php"> <img src="../../images/GUIImages/logout.png" style="width:20px;border:0;vertical-align: middle;"/> Logout </a> <br>
        </form>
      </div>

    </tr>
    <tr>
      <td></td>
      <td colspan="2" align="center"> <a href="../ManageUser/SPHomepage.php" style="margin-right: 40px">Home</a> <a href="../ManageUser/SPManageProduct.php" style="margin-right: 40px">Manage Product</a> <a href="../ProvideTrackingAndAnalysis/SPOrderList.php" style="margin-right: 40px">Order List</a> <a href="../ProvideTrackingAndAnalysis/SPTrackOrder.php" style="margin-right: 40px">Track Order</a> <a href="../ProvideTrackingAndAnalysis/SPReport.php">My Report</a></td>
      <td align="center">Welcome <?=$_SESSION['name']?>! (Service Provider)</td>
    </tr>
  <table id="inside_part" width="65%" height="75%" align="center">
    <tr> <hr>
      <th align="center" colspan="3">Food Product</th>
    </tr>
    <tr>
      <td></td>
      <td>Variation: <select id="food_variation">
          <option value="none">All</option>
          <option value="Biscuits">Biscuits & Crackers</option>
          <option value="Noodles">Noodles</option>
          <option value="Chips">Potato Chips & Crisps</option>
          <option value="Fruits">Dry Fruits & Nuts</option>
          <option value="Others">Others</option>
          </select></td>
      <td align="center">Search: <input type="text" size="20" id="search_box" placeholder="Search name here"> </td>
    </tr>
    <tr height="75%">
      <td colspan="3">
        <div id="food_content" style="height: 90%"></div>
      </td>
    </tr>
    <tr>
      <td><button type="button" name="back" onclick="window.location.href='../ManageUser/SPManageProduct.php'"> Back </button></td>
      <td></td>
      <td align="right"><input id="product_btn" type="button" name="add" onclick="window.location.href='FoodAddProduct.php'" value="Add Product"></td>
    </tr>
  </table>
  <table id="bottom" height="15%" width="100%">
    <tr> <hr>
      <td valign="center" rowspan="2" width="10%">
        <ul style="list-style-type:none;">
        <li><a href="../../ApplicationLayer/Home/Homepage.php">Home</a></li>
        <li><a href="../../ApplicationLayer/Home/CustomerSignup.php">Sign up</a></li>
        <li><a href="../../ApplicationLayer/Home/Login.php">Login</a></li>
        <li><a href="../../ApplicationLayer/Home/Faq.php">FAQ</a></li>
        </ul>
      </td>
      <td valign="center" rowspan="2">
        <ul style="list-style-type:none;">
        <li><a href="../../ApplicationLayer/Home/About.php">About us</a></li>
        <li><a href="../../ApplicationLayer/Home/RunnerSignup.php">Become a Runner</a></li>
        <li><a href="../../ApplicationLayer/Home/SPSignup.php">Become a Service Provider</a></li>
        <li><a href="../../ApplicationLayer/Home/Terms.php">Terms & Conditions</a></li>
        </ul>
      </td>
      <td align="center" width="25%" valign="bottom"> Follow us in </td>
    </tr>
    <tr>
      <td align="center" width="25%">
        <button type="button" style="border:transparent;background:none;" onclick="location.href='http://www.facebook.com'">
        <img src="../../images/GUIImages/facebook.png" style="width:25px;height:25px;border:0"/>
        </button>
        <button type="button" style="border:transparent;background:none;" onclick="location.href='http://www.twitter.com'">
        <img src="../../images/GUIImages/twitter.png" style="width:25px;height:25px;border:0"/>
        </button> 
        <button type="button" style="border:transparent;background:none;" onclick="location.href='http://www.instagram.com'">
        <img src="../../images/GUIImages/instagram.png" style="width:25px;height:25px;border:0"/>
        </button> </td>
    </tr>
    <tr>
      <td align="center" colspan="4"> Speeda Sdn.Bhd (1234567-T) &#169; All Rights Reserved</td> 
    </tr>
  </table>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $("#sp_button").click(function() {
    $(".sp_form").show();
      });
    });

    $(document).mouseup(function (e) { 
      if ($(e.target).closest(".sp_form").length 
            === 0) { 
        $(".sp_form").hide(); 
      } 
    }); 

    $(document).ready(function(){
    load_data(2, 1, 0, 0, "none");

    function load_data(getData, page, sortPrice = '', sortQuantity = '', variation = '', search = '' ){
      $.ajax({
        url:'FoodProduct.php',
        method:"POST",
        data:{getData:getData, page:page, sortPrice:sortPrice, sortQuantity:sortQuantity, variation:variation, search:search},
        success:function(data){
        $('#food_content').html(data);

        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var search = $('#search_box').val();
      var sortPrice = $('#sortPrice_before').val();
      var sortQuantity = $('#sortQuantity_before').val();
      var variation = $("#show_variation").val();
      load_data(2, page, sortPrice, sortQuantity, variation, search);
    });

    $('#search_box').keyup(function(){
      var search = $('#search_box').val();
      var variation = $("#show_variation").val();
      var sortPrice = $('#sortPrice_before').val();
      var sortQuantity = $('#sortQuantity_before').val();
      load_data(2, 1, sortPrice, sortQuantity, variation, search);
    });

    $(document).on('click', '#sortPriceBtn', function(){
      var search = $('#search_box').val();
      var sortPrice = $('#sortPrice').val();
      var variation = $("#show_variation").val();
      load_data(2, 1, sortPrice, 0, variation, search);
    });

    $(document).on('click', '#sortQuantityBtn', function(){
      var search = $('#search_box').val();
      var sortQuantity = $('#sortQuantity').val();
      var variation = $("#show_variation").val();
      load_data(2, 1, 0, sortQuantity, variation, search);
    });

    $(document).on('change', '#food_variation', function(){
      var variation = $('#food_variation').val();
      var search = $('#search_box').val();
      load_data(2, 1, 0, 0, variation, search);  
    });

    });

  </script>

