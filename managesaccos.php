<?php 
include("conn.php");
include("header1.php"); 
?>
<div id="content">
<a href="manageverifysacco.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															    color: aqua;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span>Verify Sacco </a>

<h3 style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Manage Saccos</h3>
															 
<form action="" id="form2" method="POST">
			<table border="0" style="text-align:center;background: rgba(191, 180, 42, 0.08);margin:auto;width: 95%; margin-top: 23px;">
				<tr class="tr1">
					<td colspan="7" style="background: rgb(5, 5, 5);">Add New Sacco</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;font-weight: bold;color: #ffffff;">
					<td >Saccos Name</td>
					<td>Iso No</td>
					<td>Phone</td>
					<td>Email</td>
					<td>County</td>
					<td>Location</td>
					<td>password</td>
				</tr>
								<tr id="in_table" style="text-align: center;">
					<td><input type="text" required=""  name="sacco" id="full_name"></td>
					<td><input type="number" required="" name="id_num" id="id_num" ></td>
					<td><input type="tel" required="" name="phone" style="height: 20px;width: 105px;padding: 0 5px;margin-bottom: 10px; color: #000000; font-size: 12px; font-variant: normal;line-height: normal; background: #f1efef;" ></td>					
					<td><input type="email" required="" name="email" id="email" ></td>
					<td><select   required="" name="farmlocation" id="username" >
					<option value="">--select--</option>
		
	<option value="Baringo">Baringo</option>
	<option value="Bomet">Bomet</option>
	<option value="Bungoma">Bungoma</option>
	<option value="Busia">Busia</option>
	<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
	<option value="Kericho">Kericho</option>
	<option value="Kilifi">Kilifi</option>
	<option value="Kisumu">Kisumu</option>
	<option value="Kitui">Kitui</option>
	<option value="Laikipia">Laikipia</option>
	<option value="Nakuru">Nakuru</option>
	<option value="Nandi">Nandi</option>
	<option value="Narok">Narok</option>
	<option value="Nyeri">Nyeri</option>
	<option value="Uasin Gishu">Uasin Gishu</option>
	</select> 
					</td>
					<td><input type="text" required="" name="residence" id="username" ></td>
					<td><input type="password" required="" name="password" id="password" ></td>
						
					</td>
				</tr>

				<tr><td colspan="7"><input type="SUBMIT" style="margin-top:0px"value="Admitt Sacco" name="register" id="register" ></td></tr>
			</table>
</form>
<?php
		if (isset($_POST['register'])){
		$sacco=$_POST['sacco'];
		$idnum=$_POST['id_num'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$farmlocation=$_POST['farmlocation'];
		$n=$_POST['email'];
		$residence=$_POST['residence'];
		$pass=$_POST['password'];
		$t='1';

		
		$query=mysql_query("INSERT INTO users (name,sacco,id_num,phone,email,farmlocation,residence,username,pass) VALUE ('$t','$sacco','$idnum','$phone','$email','$farmlocation','$residence','$n','$pass')")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=managesaccos.php'>
		<p style="text-align:center;color:yellow;font-size: 16px">Processing.... Please Wait!!</p>
		<?php
		die;}
if (isset($_POST['act'])){
		$del_user=$_POST['vdel_user'];
		$query=mysql_query("Delete from  users  WHERE  id_num='$del_user'")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=accounts.php'>
		<p style="text-align:center;color:yellow;font-size: 16px">User is being Deleted.... Please Wait!!</p>
		<?php
		die;}
if (isset($_POST['deact'])){
		$del_user=$_POST['vdel_user'];
		$query=mysql_query("UPDATE  users SET  active = '0' WHERE  id_num='$del_user'")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=accounts.php'>
		<p style="text-align:center;color:yellow;font-size: 16px">Processing.... Please Wait!!</p>
		<?php
		die;}	
?>		


			<br>
<table style="border-color: #3d9db3;margin: auto;width: 95%;font-size: 15px;text-align:center;background: #ebeef1; "border="0">
<tr class="tr1"><td colspan="9"><p>All System Users</p></td></tr>
	<tr style="height: 23px;
    font-size: 16px;
    font-family: serif;
    text-transform: capitalize;
    text-align: center;
   /* background:#ffffff;*/
    color: #213458;
    font-weight: bold;">
		<td>id</td>
		<td>Sacco Name</td>
		<td>Certification(iso)</td>
		<td>County</td>
		<td>Headq</td>
		<td>email</td>
		<td>Phone</td>
	</tr>
<?php
$get_all=mysql_query("SELECT * FROM users users WHERE name='1' Order BY user_level asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
$x=1; 
for($h=0;$h<$all_count;$h++)
	 {
	 $sacco=mysql_result($get_all,$h,'sacco');
	 $id_num=mysql_result($get_all,$h,'id_num');
	 $phone=mysql_result($get_all,$h,'phone');
	 $username=mysql_result($get_all,$h,'username');
	 $id=mysql_result($get_all,$h,'id');
	 $farmlocation=mysql_result($get_all,$h,'farmlocation');
	 $email=mysql_result($get_all,$h,'email');
	 $residence=mysql_result($get_all,$h,'residence');
?>
	<tr	style="background: white;color:black;text-align: left;">

		<td style="background: white;color: #086277;"><?php echo $x;?></td>
		<td><?php echo $sacco;?></td>
		<td><?php echo $id_num; ?></td>
		<td><?php echo $farmlocation; ?></td>
		<td><?php echo $residence; ?></td>
		<td><?php echo $email; ?></td>
		<td><?php echo $phone; ?></td>
	</tr>
<?php  $x++; } ?>
</table>
<br/>
<br/>
</div>
<?php include("footer.php");?>