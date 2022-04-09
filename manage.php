<?php 
include("conn.php");
include("header1.php"); 
?>
<div id="content">
<h3>Manage Users</h3>
<form action="" id="form2" method="POST">
			<table border="0" style="text-align:center;background: rgba(191, 180, 42, 0.08);margin:auto;width: 95%; margin-top: 23px;">
				<tr class="tr1">
					<td colspan="7">Register new System User</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;font-weight: bold;color: #ffffff;">
					<td >Full Names</td>
					<td>ID Number</td>
					<td>Email</td>
					<td>Username</td>
					<td>Password</td>
					<td>User level</td>
				</tr>
				<tr id="in_table" style="text-align: center;">
					<td><input type="text" required=""  name="full_name" id="full_name"></td>
					<td><input type="number" required="" name="id_num" id="id_num" ></td>
					<td><input type="email" required="" name="email" id="email" ></td>
					<td><input type="text" required="" name="username" id="username" ></td>
					<td><input type="password" required="" name="password" id="password" ></td>
					<td><Select required="" name="level" id="level">
						<option value="1">Admin (1)</option>
						<option value="2">Sacco(2)</option>
						<option value="3">Manager(3)</option>
						<option value="4">Farmer(4)</option></select>
					</td>
				</tr>
				<tr><td colspan="7"><input type="SUBMIT" style="margin-top:0px"value="REGISTER USER" name="register" id="register" ></td></tr>
			</table>
</form>
<?php
		if (isset($_POST['register'])){
		$f_name=$_POST['full_name'];
		$idnum=$_POST['id_num'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$level=$_POST['level'];
		$username=$_POST['username'];
		
		$query=mysql_query("INSERT INTO users (name,email,pass,id_num,user_level,active,username) VALUE ('$f_name','$email','$pass','$idnum','$level','1','$username')")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=manage.php'>
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
		<td>name</td>
		<td>email</td>
		<td>Username</td>
		<td>Password</td>
		<td>I.D num</td>
		<td>User level</td>
		
	</tr>
<?php
$get_all=mysql_query("SELECT * FROM users WHERE name !=1 Order BY user_level asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
$x=1; 
for($h=0;$h<$all_count;$h++)
	 {
	 $f_name=mysql_result($get_all,$h,'name');
	 $email=mysql_result($get_all,$h,'email');
	 $phone=mysql_result($get_all,$h,'phone');
	 $id_num=mysql_result($get_all,$h,'id_num');
	 $username=mysql_result($get_all,$h,'username');
	 $id=mysql_result($get_all,$h,'id');
	 $gender=mysql_result($get_all,$h,'gender');
	 $user_level=mysql_result($get_all,$h,'user_level');
	 $act=mysql_result($get_all,$h,'active');
	 $pass=mysql_result($get_all,$h,'pass');
?>
	<tr	style="background: white;color:black;text-align: left;">

		<td style="background: white;color: #086277;"><?php echo $x;?></td>
		<td><?php echo $f_name;?></td>
		<td><?php echo $email; ?></td>
		<td><?php echo $username; ?></td>
		<td><?php echo $pass; ?></td>
		<td><?php echo $id_num; ?></td>
		<td><?php echo $user_level; ?></td>
	</tr>
<?php  $x++; } ?>
</table>
			<br><br>
<form action="" method="POST">
<table style="    margin: auto;
    background: #213458;
    padding: 6px 40px;
    font-size: 13px;
    color: #ebeef1;">
	<tr>
		<td colspan="2">Select Username you wish to delete</td>
	</tr>
	<tr>
		<td><select name="user" required>
		<option value="">--select--</option>
<?php
$get_all=mysql_query("SELECT * FROM users WHERE username !='admin' Order BY user_level asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
for($h=0;$h<$all_count;$h++)
	 {
	 $name=mysql_result($get_all,$h,'name');
	 $id=mysql_result($get_all,$h,'id');
?>
		<option value="<?php echo $id ;?>"><?php echo $name; ?></option>
<?php
	 }
?>
		</select>
		<input type="submit" name="delete" value="Delete User">
		</td>	
	</tr>
</table>
</form>
<?php
if(isset($_POST['delete'])){
	$g_id=$_POST['user'];
	$query=mysql_query("DELETE FROM users WHERE id='$g_id'")or die(mysql_error());
	echo "<script>alert('user deleted Successfully!!');
		setTimeout(function(){window.location.href='manage.php'}, 50);
</script>";
}
?>
</div>
<?php include("footer.php");?>