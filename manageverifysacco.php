<?php 
include("conn.php");
include("header1.php"); 
?>
<div id="content">
<a href="managesaccos.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															    color: aqua;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span>Back </a>


<h3 style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Verify Saccos</h3>
															
			<br>
<table style="border-color: #3d9db3;margin: auto;width: 95%;font-size: 15px;text-align:center;background: #ebeef1;margin-left: -3%;"border="0">
 <form action="" method="POST">
<tr class="tr1"><td colspan="10"><p>Verify Saccos</p></td></tr>
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
		<td>User level</td>
		<td>Activate User</td>
		<td>Dactivate User</td>
	</tr>
<?php
$get_all=mysql_query("SELECT * FROM users WHERE name='1' Order BY user_level asc")or die (mysql_error());
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
	 $user_level=mysql_result($get_all,$h,'user_level');
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
		<td><?php echo $user_level; ?></td>
		
		<td><input type="submit" name="update" value="<?php echo $id; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>
		<td><input type="submit" name="submit" value="<?php echo $id; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>
	</tr>
<?php  $x++; } ?>
</table>

			<br><br>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['submit'];
	$query=mysql_query("DELETE FROM users WHERE id='$id'")or die(mysql_error());
	echo "<script>alert('user deleted Successfully!!');
		setTimeout(function(){window.location.href='manageverifysacco.php'}, 50);
</script>";
}
?>

<?php
if(isset($_POST['update'])){
	$id=$_POST['update'];
	$query=mysql_query("UPDATE users SET user_level = '2' WHERE id='$id'")or die(mysql_error());
	echo "<script>alert('user verified Successfully!!');
		setTimeout(function(){window.location.href='manageverifysacco.php'}, 50);
</script>";
}
?>


</div>
<?php include("footer.php");?>