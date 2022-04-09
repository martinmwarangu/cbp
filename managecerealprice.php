<?php 
include("conn.php");
include("header2.php"); 
?>
<div id="content">
<h3>Manage Cereals</h3>
<form action="" id="form2" method="POST">
			<table border="0" style="text-align:center;background: rgba(191, 180, 42, 0.08);margin:auto;width: 95%; margin-top: 23px;">
				<tr class="tr1">
					<td colspan="4">Enter New Cereal</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;font-weight: bold;color: #ffffff;">
					<td colspan="1">Cereal Type</td>
					<td colspan="1" style="text-align: left;padding-left: 3%;">Price</td>
				</tr>
				<tr style="text-align: center;">
					<td colspan="1"><input type="text" required=""  name="cerealtype" style="width: 50%;margin-right: -32%;"></td>
					<td colspan="1"><input type="number" required="" name="price" style="width: 50%;margin-right:40%;"></td>
					</tr>

				<tr>
				<td colspan="4"><input type="SUBMIT" style="margin-top:0px" value="Add New Cereal" name="register" id="register"  style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;" >
				</td></tr>
				<tr>
				<td colspan="4"><input type="SUBMIT" style="margin-top:0px" value="Update Cereal" name="Update" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;">
				</td></tr>
			</table>
</form>
<?php
		if (isset($_POST['register'])){
		$cerealtype=$_POST['cerealtype'];
		$price=$_POST['price'];

		$query=mysql_query("INSERT INTO cereals (cerealtype,price) VALUE ('$cerealtype','$price')")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=managecerealprice.php'>
		<p style="text-align:center;color:yellow;font-size: 16px">Processing.... Please Wait!!</p>
		<?php
		die;}

if (isset($_POST['Update'])){
		$cerealtype=$_POST['cerealtype'];
		$price=$_POST['price'];
		$query=mysql_query("UPDATE  cereals SET price='$price' WHERE '$cerealtype' = cerealtype")or die(mysql_error());
		?>
		<meta http-equiv='refresh' content='1;url=managecerealprice.php'>
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
		<td>Cereal Name</td>
		<td>Price</td>
		<td>Delete</td>

	</tr>
<?php
$get_all=mysql_query("SELECT * FROM cereals Order BY cerealtype asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
$x=1; 
for($h=0;$h<$all_count;$h++)
	 {
	 $id=mysql_result($get_all,$h,'id');
	 $cerealtype=mysql_result($get_all,$h,'cerealtype');
	 $price=mysql_result($get_all,$h,'price');
	
?>
<form action="" method="POST">
	<tr	style="background: white;color:black;text-align: left;">

		<td style="background: white;color: #086277;"><?php echo $x;?></td>
		<td><?php echo $cerealtype;?></td>
		<td><?php echo $price; ?></td>
		<td><input type="submit" name="delete" value="<?php echo $id; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>
	</tr>
<?php  $x++; } ?>
</form>
</table>
			<br><br>


<?php
if(isset($_POST['delete'])){
	$id=$_POST['delete'];
	$query=mysql_query("DELETE FROM cereals WHERE id='$id'")or die(mysql_error());
	echo "<script>alert('Cereals type Successfully!!');
		setTimeout(function(){window.location.href='managecerealprice.php'}, 50);
</script>";
}
?>
</div>
<?php include("footer.php");?>