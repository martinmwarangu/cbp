<?php 
include("conn.php");
include("header.php"); 
?>
 <div id="content">
	<h3 style="margin-top: 3%;">Contact Us</h3>
	<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$nid=$_POST['nid'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$residence=$_POST['residence'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$sql="SELECT * FROM gmails WHERE email='$email'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		echo "<script>alert('Error!!!! email is already send!!');</script>";
	}
	if($count==0){
	$query=mysql_query("INSERT INTO gmails (name,nid,phone,email,residence,subject,message) VALUES ('$name','$nid','$phone','$email','$residence','$subject','$message')") or die(mysql_error());

	echo "<script>alert('Your Mail has been Send Successfully!!');
		setTimeout(function(){
	   window.location.href='Contact Us.php'
	}, 50);
	</script>"; }
}
?>
<form action="" id="form" METHOD="POST" style = "float:left; width: 460px; margin-left: 5%;">
<table border="0" cellspacing="8px" style="    width: 100%;" >
<TR>
	<td>full Name</td><td><input type="text" required name="name" placeholder="full name" style="background: white;width: 91%;height: 28px;"></td>
</TR>
<TR>
	<td>National Id Number</td><td><input type="number" required style="background: white;width: 91%;height: 28px;" name="nid" min="10000" placeholder="your national id number"></td> 
</TR>
<TR>
	<td>Phone</td><td><input type="number" required style="background: white;width: 91%;height: 28px;" name="phone" min="10000" placeholder="Phone"></td> 
</TR>
<TR>
	<td>Residence</td><td>
	<select required name="residence" style="    background: white;
    width: 91%;
    height: 28px;" placeholder="Town">
	<option value="">--select--</option>
	<option value="Nakuru">Nakuru</option>
	<option value="Kisumu">Kisumu</option>
	<option value="Laikipia">Laikipia</option>
	<option value="Nyeri">Nyeri</option>
	<option value="Kericho">Kericho</option>
	<option value="Baringo">Baringo</option>
	</select> 
</TR>
<TR>
	<td>Email</td><td><input type="email" required style="    background: white;
    width: 91%;
    height: 28px;" name="email" placeholder="email address"></td> 
</TR>
<TR>
	<td>Subject</td><td><input type="text" required style="    background: white;
    width: 91%;
    height: 28px;" name="subject" placeholder="Subject"></td> 
</TR>
<TR>
	<td>Message</td><td><textarea type="Text" required style="    background: white;
    width: 91%;
    height: 108px;" name="message" placeholder="Enter Your Message..."> </textarea></td> 
</TR>

<TR>
<td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="SUBMIT"></td> 
</TR>
</table>
</form>
<form action="" id="form" METHOD="POST" style ="float:Right;    
										float: Right;
										width: 321px;  margin-top: 31px;">

<p>
(CEREALS BOARD FARMERS PORTAL, iso)
Kenya,Nakuru City,Egertone Uni
Phone: +254(0)7xxxxxxxxx<br><br>

Contact Numbers:
info@cerealboardfarmersportal.co.ke
care@cerealboardfarmersportal.co.ke <br>
- +255 (070)1635572 ; (254) xxx-xxx
</p>

</form>
 </div>
<?php include("footer.php"); ?>