<?php 
session_start();

if(!isset($_SESSION['login_lev']) || (trim($_SESSION['login_lev']) == '')) {
	$logedin=0;
}

else {
	$use_lev=$_SESSION['login_lev'];
	$use_id=$_SESSION['login_id'];
	$use_name=$_SESSION['login_name'];
	$use_id=$_SESSION['login_id'];
	$use_phone=$_SESSION['login_phone'];
	$use_email=$_SESSION['login_email'];
	$use_residence=$_SESSION['login_residence'];
	$logedin=$use_lev;
	}

include('conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cereal Board Management System</title>
<link rel = "icon" type = "image/png" sizes = "32x32" href = "images/cereal1.png">
<meta name="keywords" content="#" />
<meta name="description" content="#" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="#" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script src="js/slider.js"></script>

<style>

#menu li a:hover,#menu li a:active {
    background-color:white;
	color:#213458;
	border-radius:5%;
	padding-bottom:0.5%;
}


</style>

</head>
<body>

<div id="wrapper">

    <div id="header_bar">
    <img src="images/Cereal1.png" alt="CEREAL BOARD MANAGEMENT" style ="width: 9%;float: left;margin-left: -10%; margin-top: -2%;">
            <div id="header" >
            
                <h1><a href="index.php" target="_parent">
				   CEREALS BOARD FARMERS PORTAL
                    </a></h1>
            </div>
            
           <!-- <div id="search_box">
                <form action="#" method="get">
                    <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                   <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
                </form>
            </div>-->
    
    </div> 
    
    <div id="banner">
    
        <div id="menu">
            <ul>
			<div id="myDIV">
                
				<?php if($logedin==0){ ?>
				<li class="btn"><a href="index.php"> <span></span>Home </a></li>
				<li class="btn"><a href="About Us.php"><span></span>About Us </a></li>
				<li class="btn"><a href="Contact Us.php"><span></span>Contact Us </a></li>
				<li class="btn"><a href="Location.php"><span></span>Our Location </a></li>
				<li style="margin-left: 20%;background: rgba(153, 161, 81, 0);">click here to<a href="signup.php" style="padding-bottom: 0.5%;
					background: #213458;height: 60px;text-align: center;margin-left: 2%;margin-right: 0%;padding-left: 9px;border-radius: 5%;padding-right: 2%;"><span></span>Signup </a></li>
				
				<?php } ?>
			

				<?php if($logedin==2){ ?>
				<?php } if($logedin==1){ ?>
				<li><a href="createinformation.php"><span></span>Create Info </a></li>
				<li><a href="manageinformation.php"><span></span> Manage Info </a></li>
				<li><a href="manage.php"><span></span>Manage Users </a></li>
				<?php } if($logedin!=0){ ?>
							
				<div style="background: rgba(70, 83, 76, 0.52); margin-left: 86%;margin-top: -4%;height: 46px;">
				<li style="background: #808035;border: none;padding: 0px;"><a href="logout.php" style="float: right;margin-top: 20%;font-family: cursive;font-size: 12px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;float: right;margin-top: -36%;padding: 0%;background-color: rgba(128, 128, 53, 0.22); border: none;font-size: 14px; font-family: serif;"><span></span><?php echo $use_name ?> </a></li>
				</div>
				<?php } ?>
				</div>	
				 </div>				
            </ul>  		
         
        <div id="slider">
		
		
		<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/slide-2.jpg"  style="width: 100%;height: 311px;margin-top: -8px;">
  <div class="text"><span>putting our</span><span >heart &amp; soul</span><span>into the field</span></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/slide-3.jpg"  style="width: 100%;height: 311px;margin-top: -8px;">
  <div class="text"><span>we have a strong</span><span class="row-2">agriculture</span><span>heritage</span></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/slide7.jpg"  style="width: 100%;height: 311px;margin-top: -8px;">
  <div class="text"><span>growing clean</span><span>and full of health</span><span>products</span></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
 <script src="js/slider2.js" type="text/javascript"></script> 
        </div> 
<?php if ($logedin==0) { ?>       
        <div id="login">
        
            <h2>SIGN-IN</h2>
            <?php
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);
	$sql="SELECT * FROM users WHERE username='$username' and pass='$password' AND active='1'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count==1){
			for($i=0;$i<$count;$i++){
				$use_id=mysql_result($result,$i,'id');
				$use_lev=mysql_result($result,$i,'user_level');
				$use_name=mysql_result($result,$i,'username');
				$use_id_num=mysql_result($result,$i,'id_num');
				$use_phone=mysql_result($result,$i,'phone');
				$use_email=mysql_result($result,$i,'email');
				$use_residence=mysql_result($result,$i,'residence');
				$use_sacco=mysql_result($result,$i,'sacco');
		}
				
	$_SESSION['login_lev']=$use_lev;
	$_SESSION['login_id']=$use_id;
	$_SESSION['login_name']=$use_name;
	$_SESSION['login_id_num']=$use_id_num;
	$_SESSION['login_phone']=$use_phone;
	$_SESSION['login_email']=$use_email;
	$_SESSION['login_sacco']=$use_sacco;
	$_SESSION['login_residence']=$use_residence;	
	
		header("location:info.php");}
else { print '<p style="color:red;text-align: center;
    ">* Wrong password *</p>';}
}
?>
            <form action="" id="form2" method="post">
                <label>Username</label>
                <input type="text" value="" name="username" size="10" class="input_field"  />
                <label>Password</label>
                <input type="password" value="" name="password" class="input_field"  />
                <input type="submit" name="login" value="Login" alt="login" id="submit_btn" title="Login" />
            </form>
            <div class="cleaner"></div>
            
        </div>
<?php } ?>
<div id="men">
<ul>			
<?php if($logedin==1){ ?>
				<div style="background: black; margin-left: 50%;">
				<li> <img src="images/adminpic1.png" alt="profilepic" style ="width: 15%;"><a href="logout.php" style="width: 54px;margin-top: -48px;
				margin-left: 85%; color: red; background: #213458;border-radius: 30px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;color: chartreuse;margin-top: 20px;margin-right: 9%;font-size: 14px;font-family: cursive; text-align: center;margin-bottom: 2%;"><span></span><?php echo $use_name ?> </a></li>
				</div>	
				<?php } ?>
				
				<?php if($logedin==2){ ?>
				<div style="background: black; margin-left: 50%;">
				<li> <img src="images/adminpic1.png" alt="profilepic" style ="width: 15%;"><a href="logout.php" style="width: 54px;margin-top: -48px;
				margin-left: 85%; color: red; background: #213458;border-radius: 30px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;color: chartreuse;margin-top: 20px;margin-right: 9%;font-size: 14px;font-family: cursive; text-align: center;margin-bottom: 2%;"><span></span><?php echo $use_name ?> </a></li>
				</div>
				<?php } ?>
				
				<?php if($logedin==3){ ?>
				<div style="background: black; margin-left: 50%;">
				<li> <img src="images/adminpic1.png" alt="profilepic" style ="width: 15%;"><a href="logout.php" style="width: 54px;margin-top: -48px;
				margin-left: 85%; color: red; background: #213458;border-radius: 30px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;color: chartreuse;margin-top: 20px;margin-right: 9%;font-size: 14px;font-family: cursive; text-align: center;margin-bottom: 2%;"><span></span><?php echo $use_name ?> </a></li>
				</div>
				<?php } ?>
    </ul>
	</div>
    </div> 