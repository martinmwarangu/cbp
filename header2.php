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
	$use_sacco=$_SESSION['login_sacco'];
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
				   <?php echo $use_sacco?> <p style="font-size: 11px;float: right;padding: 1%;margin-right: 3%;">Today is :  <?php echo date("l");echo " ";echo date("M,d,Y");?></p>
                    </a></h1>
            </div>
            
           <!-- <div id="search_box">
                <form action="#" method="get">
                    <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                   <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
                </form>
            </div>-->
    
    </div> 
    
    <div style="clear: both; width: 990px;height: 0px; padding: 3px 5px 41px 5px; overflow: hidden; background-color: rgba(180, 185, 83, 0.63);
    border-bottom-left-radius: 5%; border-bottom-right-radius: 5%;">
    
        <div id="menu">
            <ul style="margin-left: 9%;">
			<div id="myDIV">
				<?php if($logedin==0){ ?>
				<li class="btn"><a href="About Us.php"><span></span>About Us </a></li>
				<li class="btn"><a href="Contact Us.php"><span></span>Contact Us </a></li>
				<li class="btn"><a href="Location.php"><span></span>Our Location </a></li>
				<li style="margin-left: 20%;background: rgba(153, 161, 81, 0);">click here to<a href="signup.php" style="padding-bottom: 0.5%;
					background: #213458;height: 60px;text-align: center;margin-left: 2%;margin-right: 0%;padding-left: 9px;border-radius: 5%;padding-right: 2%;"><span></span>Signup </a></li>
				
				<?php } ?>
			

				<?php if($logedin==2){ ?>
				<li class="btn"><a href="info2.php"> <span></span>Information </a></li>
				<li><a href="verifyfarmer.php"><span></span>Verify Farmer</a></li>
				
				<li><a href="managecerealprice.php"><span></span>Enter Cereal</a></li>
				<li><a href="managefarmerdelivery.php"><span></span>Deliveries </a></li>
				<li><a href="saccoreport.php"><span></span>Reports</a></li>
				 <li><a href="account2.php"><span></span>My Account </a></li>
				
				<div style="background: rgba(70, 83, 76, 0.52); margin-left: 86%;margin-top: -4%;height: 46px;">
				<li style="background: #808035;border: none;padding: 0px;"><a href="logout.php" style="float: right;margin-top: 20%;font-family: cursive;font-size: 12px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;float: right;margin-top: -36%;padding: 0%;background-color: rgba(128, 128, 53, 0.22); border: none;font-size: 14px; font-family: serif;"><span></span><?php echo $use_name ?> </a></li>
				</div>
				
				
				
				<?php } if($logedin==1){ ?>
			 <li class="btn"><a href="info.php"> <span></span>Information </a></li>
				<li><a href="manage.php"><span></span>Manage Users </a></li>
				<li><a href="managesaccos.php"><span></span>Manage Saccos </a></li>
				<li><a href="otherexpense.php"><span></span>Farmers Records </a></li>
				
				<li><a href="account.php"><span></span>My Account </a></li>
				
				<div style="background: rgba(70, 83, 76, 0.52); margin-left: 86%;margin-top: -4%;height: 46px;">
				<li style="background: #808035;border: none;padding: 0px;"> <img src="images/adminpic1.png" alt="profilepic" style ="width: 46%;margin-left: -8%;"><a href="logout.php" style="float: right;margin-right: 30%;margin-top: -45%;font-family: cursive;font-size: 12px;"><span></span>Logout </a></li>
                <li style="color: chartreuse;float: right;margin-top: -21%;padding: 0%;background-color: rgba(128, 128, 53, 0.22); border: none; margin-right: 28%;font-size: 14px; font-family: serif;"><span></span><?php echo $use_name ?> </a></li>
				</div>
				
				
				
				<?php } if($logedin!==3){ ?>
				
				<li><a href="manage.php"><span></span>View Assigned Sacco </a></li>
				<li><a href="managesaccos.php"><span></span>Deliver to Sacco  </a></li>
				<li><a href="otherexpense.php"><span></span>Farmers Records </a></li>
				
				
				<?php } ?>
				</div>	
				 </div>				
            </ul>  		
    </div> 