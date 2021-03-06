<?php
session_start();

require_once '../../BusinessServicesLayer/userController/userController.php';

$user = new userController();

if(isset($_SESSION["status"]) && $_SESSION["status"] == "truesp"){
    header("location: ../ManageUser/SPHomepage.php");
    exit;
}
else if(isset($_SESSION["status"]) && $_SESSION["status"] == "truecust"){
    header("location: ../ManageUser/CustomerHomepage.php");
    exit;
}
else if(isset($_SESSION["status"]) && $_SESSION["status"] == "truerun"){
    header("location: ../ManageUser/RunnerHomepage.php");
    exit;
}
else if(isset($_SESSION["status"]) && $_SESSION["status"] == "truead"){
    header("location: ../ManageUser/AdminHomepage.php");
    exit;
}

if(isset($_POST['login'])){
    $user->login();
}

?>
<html>
<head>
  <title>Login</title>
  <link href="../../css/design.css" rel="stylesheet">
</head>
<body>
<body bgcolor="#ffffe6">
  <table id="top" height="9%" width="100%">
    <tr height="4%" valign="center">
      <th align="left" width="33.3%"> <img src="../../images/GUIImages/courier.png" width="25" height="25"> Speeda</th>
      <th align="center" > 100% Guaranteed Dispatch </th>
      <th align="right" width="33.3%"> <input type="button" onclick="window.location.href='Login.php'" value="Login" style="margin-right:50px "> <input type="button" onclick="window.location.href='CustomerSignup.php'" value="Sign up"></th>
    </tr>
    <tr height="6.6%">
      <td></td>
      <td colspan="2" valign="center" align="right"> <input type="button" onclick="window.location.href='Homepage.php'" value="Home" style="margin-right:40px">   <input type="button" onclick="window.location.href='About.php'" value="About us" style="margin-right:40px">   <input type="button" onclick="window.location.href='Service.php'" value="Our Service" style="margin-right:40px"> <input type="button" onclick="window.location.href='ContactUs.php'" value="Contact us" style="margin-right:40px">   <input type="button" onclick="window.location.href='Faq.php'" value="FAQ" style="margin-right:50px"></td>
    </tr>
  </table>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <table id="scd_detail" width="30%" height="72.5%" align="center">
    <tr> <hr>
      <th align="center" colspan="2"><h1>Login</h1> </th>
    </tr>
    <tr>
      <td align="right">Email : </td>
      <td align="center"><input type="text" name="email" size="30" value="<?php if (isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?>"required> <br></td>
    </tr>
    <tr>
      <td align="right">Password : </td>
      <td align="center"><input type="password" name="password" size="30" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"  required> </td>
    </tr>
    <tr>
      <td align="right"><label><input type="checkbox" name="rememeber" <?php if(isset($_COOKIE["password"]) && isset($_COOKIE["email"])) { echo 'checked'; } ?>/>Remember me</label></td>
    </tr>
    <tr>
      <td align="right" colspan="2"> <a href="ResetPassword.php" style="text-decoration: underline;"> Forgot Password </a></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="radio" name="user_type" value="Customer" required> Customer
      <input type="radio" name="user_type" value="Runner"> Runner 
      <input type="radio" name="user_type" value="Service Provider"> Service Provider <input type="radio" name="user_type" value="Admin"> Admin</td>
    </tr>
    <tr>
      <td align="center" colspan="2"> <input type="submit" name="login" value="Login" style="height: 30px;width: 60px"> </td>
    </tr>
    <tr>
      <td align="center" colspan="2"> Don't have any account yet? <a href="CustomerSignup.php" style="text-decoration: underline;"> Sign up as our customer now </a></td>
    </tr>
  </table>
  </form>
  <table id="bottom" height="15%" width="100%">
    <tr> <hr>
      <td valign="center" rowspan="2" width="10%">
        <ul style="list-style-type:none;">
        <li><a href="Homepage.php">Home</a></li>
        <li><a href="CustomerSignup.php">Sign up</a></li>
        <li><a href="Login.php">Login</a></li>
        <li><a href="Faq.php">FAQ</a></li>
        </ul>
      </td>
      <td valign="center" rowspan="2">
        <ul style="list-style-type:none;">
        <li><a href="About.php">About us</a></li>
        <li><a href="RunnerSignup.php">Become a Runner</a></li>
        <li><a href="SPSignup.php">Become a Service Provider</a></li>
        <li><a href="Terms.php">Terms & Conditions</a></li>
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
