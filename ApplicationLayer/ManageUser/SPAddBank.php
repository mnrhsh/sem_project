<?php
session_start();

require_once '../../BusinessServicesLayer/userController/userController.php';

$user = new userController();
$sp_id= $_SESSION["id"];

if(!isset($_SESSION["loggedin"])){
  header("location: ../../ApplicationLayer/Home/Homepage.php");
  exit;
}

if(isset($_POST['save'])){
  $user->sp_bankAdd($sp_id);   
}

?>
<html>
<head>
  <title>Add Bank</title>
  <link href="../../css/design.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
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

  </script>
</head>
<body bgcolor="#ccd9ff">
  <form action="" method="POST">
  <table id="top" height="9%" width="100%">
    <tr>
      <th align="left" height="5%" valign="top" width="25%"> <img src="../../images/GUIImages/courier.png" width="25" height="25"> Speeda</th>
      <th align="center" colspan="2" width="50%"> 100% Guaranteed Dispatch </th>
      <th align="right"> <button type="button" id="sp_button" style="border:transparent;background:none;">
                <img src="../../images/GUIImages/user.png" style="width:20px;height:20px;border:0"/></button> 
      </th>

      <div class="sp_form">
        <form action="/action_page.php" class="form-container">
          <a href="SPProfile.php"> <img src="../../images/GUIImages/gear.png" style="width:20px;border:0;vertical-align: middle;"/> My Account </a> <br>
          <a href="SPManageProduct.php"> <img src="../../images/GUIImages/finger.png" style="width:20px;border:0;vertical-align: middle;"/> Manage Product </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPOrderList.php"> <img src="../../images/GUIImages/order.png" style="width:20px;border:0;vertical-align: middle;"/> Order List </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPTrackOrder.php"> <img src="../../images/GUIImages/road.png" style="width:20px;border:0;vertical-align: middle;"/> Track Order </a> <br>
          <a href="../ProvideTrackingAndAnalysis/SPReport.php"> <img src="../../images/GUIImages/summary.png" style="width:20px;border:0;vertical-align: middle;"/> My Report</a> <br>
          <a href="Logout.php"> <img src="../../images/GUIImages/logout.png" style="width:20px;border:0;vertical-align: middle;"/> Logout </a> <br>
        </form>
      </div>

    </tr>
    <tr>
      <td></td>
      <td colspan="2" align="center"> <a href="SPHomepage.php" style="margin-right: 40px">Home</a> <a href="SPManageProduct.php" style="margin-right: 40px">Manage Product</a> <a href="../ProvideTrackingAndAnalysis/SPOrderList.php" style="margin-right: 40px">Order List</a> <a href="../ProvideTrackingAndAnalysis/SPTrackOrder.php" style="margin-right: 40px">Track Order</a> <a href="../ProvideTrackingAndAnalysis/SPReport.php">My Report</a></td>
      <td align="center">Welcome <?=$_SESSION['name']?>! (Service Provider)</td>
    </tr>
  </table>
  <table id="left_part" style="float: left;width:20%" height="80%">
    <tr> <hr>
      <th align="left"> <img src="../../images/GUIImages/user2.png" style="width:20px;border:0"/> My Account </th>
    </tr>
    <tr>
      <td><ul style="list-style-type:none;">
        <li><a href="SPProfile.php">Profile</a></li>
        <li><a href="SPChangePassword.php">Change Password</a></li>
        <li><a href="SPBank.php">Bank Info </a></li>
      </ul></td>
    </tr>
    <tr valign="bottom" height="60%">
      <td> <button type="button" onclick="window.location.href='SPBank.php'" style="width: 50px;height: 30px"> Back </button></td>
    </tr>
  </table>
  <table id="inside_part" width="80%" height="80%">
    <tr>
      <td width="10%"></td>
      <th align="left" style="font-size: 20px">Bank Info</th>
      <input type="hidden" name="sp_id" value="<?=$sp_id?>">
    </tr> 
    <tr>
      <td colspan="2" align="center"> Please enter your bank details to receive payment.</td>
    </tr>
    <tr>
      <td colspan="2">
        <table width="70%" align="center" cellpadding="15px">   
          <tr>
            <td align="right">Full Name: </td>
            <td align="center"><input type="text" name="accname" size="30" placeholder="Full name for your bank account" required></td>
          </tr>
          <tr>
            <td align="right">Account Number: </td>
            <td align="center"><input type="text" name="accnum" size="30" placeholder="Numbers only" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required></td>
          </tr>
          <tr>
            <td align="right">Bank Name: </td>
            <td align="center"><select name="bankname" required>
                    <option value="Affin Bank Berhad"> Affin Bank Berhad</option>
                    <option value="Alliance Bank Malaysia Berhad"> Alliance Bank Malaysia Berhad</option>
                    <option value="AmBank (M) Berhad"> AmBank (M) Berhad</option>
                    <option value="CIMB Bank Berhad"> CIMB Bank Berhad</option>
                    <option value="Citibank Berhad"> Citibank Berhad</option>
                    <option value="HSBC Bank Malaysia Berhad"> HSBC Bank Malaysia Berhad</option>
                    <option value="Hong Leong Bank Berhad"> Hong Leong Bank Berhad</option>
                    <option value="J.P. Morgan Chase Bank Berhad"> J.P. Morgan Chase Bank Berhad</option>
                    <option value="Malayan Banking Berhad"> Malayan Banking Berhad</option>
                    <option value="OCBC Bank (Malaysia) Berhad"> OCBC Bank (Malaysia) Berhad</option>
                    <option value="Public Bank Berhad"> Public Bank Berhad</option>
                    <option value="RHB Bank Berhad"> RHB Bank Berhad</option>
                    <option value="Standard Chartered Bank Malaysia Berhad"> Standard Chartered Bank Malaysia Berhad</option>
                    </select></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr align="center" valign="bottom">
      <td colspan="2"><input id="submit_btn" type="submit" name="save" value="Save" style="width: 50px;height: 30px"></td>
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
  </form>
</body>
</html>

