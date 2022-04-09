<?php 
include("conn.php");
include("header2.php"); 
?>
<div id="content">
 <a href="verifyfarmer.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: red;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> back</a>
															


<h3 style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Sacco Members</h3>

			<br>
<table style="border-color: #3d9db3;margin: auto;width: 95%;font-size: 15px;text-align:center;background: #ebeef1; "border="0">
 <form action="" method="POST">
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
		<td>National Id No</td>
		<td>Phone</td>
		<td>Farm Number</td>
		<td>Farm Location</td>
		<td>Dactivate Member</td>
	</tr>
<?php
$get_all=mysql_query("SELECT * FROM farmerrecord WHERE sacco ='$use_sacco' Order BY name asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
$x=1; 
for($h=0;$h<$all_count;$h++)
	 {
	 $name=mysql_result($get_all,$h,'name');
	 $phone=mysql_result($get_all,$h,'phone');
	 $id_num=mysql_result($get_all,$h,'id_num');
	 $farmno=mysql_result($get_all,$h,'farmno');
	 $fid=mysql_result($get_all,$h,'fid');
	 $farmlocation=mysql_result($get_all,$h,'farmlocation');

?>
	<tr	style="background: white;color:black;text-align: left;">

		<td style="background: white;color: #086277;"><?php echo $x;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $id_num; ?></td>
		<td><?php echo $phone; ?></td>
		<td><?php echo $farmno; ?></td>
		<td><?php echo $farmlocation; ?></td>
		<td><input type="submit" name="submit" value="<?php echo $fid; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>

	</tr>
<?php  $x++; } ?>
</form>
</table>

			<br><br>
<?php
if(isset($_POST['submit'])){
	$fid=$_POST['submit'];
	$query=mysql_query("DELETE FROM farmerrecord WHERE fid='$fid'")or die(mysql_error());
	echo "<script>alert('user deleted Successfully!!');
		setTimeout(function(){window.location.href='manageverifysaccomembers.php'}, 50);
</script>";
}
?>

</div>
<?php include("footer.php");?>