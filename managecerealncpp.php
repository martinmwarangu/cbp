<?php 
include("conn.php");
include("header2.php"); 
?>
<div id="content">
<h3>Deliver To Ncpp </h3>

	


<br>
<form action="" id="form2" method="POST">
<table style="border-color: #3d9db3;margin: auto;width: 95%;font-size: 15px;text-align:center;background: #ebeef1; "border="0">
<tr class="tr1"></td></tr>
	<tr style="height: 23px;
    font-size: 16px;
    font-family: serif;
    text-transform: capitalize;
    text-align: center;
   /* background:#ffffff;*/
    color: #213458;
    font-weight: bold;">
		<td style="text-align:center;width:20;">id</td> 
		<td style="text-align:center;">Name</td>
		<td style="text-align:center;">Phone</td>
		<td style="text-align:center;"> Cereal Type </td>
		<td style="text-align:center;">No of Bags</td>
		<td style="text-align:center;">Date Delivered</td>
		<td style="text-align:center;">Deliver To NCP</td>

	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM farmerrecord WHERE sacco='$use_sacco' AND ncpdelivered !=1 AND noofbagsdelivered>0")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				$fid=mysql_result($get_fid,$i,'fid');
				 $name=mysql_result($get_fid,$i,'name');
				 $phone=mysql_result($get_fid,$i,'phone');
				 $cerealtype=mysql_result($get_fid,$i,'cerealtype');
				 $noofbagsdelivered=mysql_result($get_fid,$i,'noofbagsdelivered');
				 $date=mysql_result($get_fid,$i,'date');
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255);color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name; ?></td>
		<td style="text-align:center;"><?php echo $phone; ?></td>
		<td style="text-align:center;"><?php echo $cerealtype; ?></td>
		<td style="text-align:center;"><?php echo $noofbagsdelivered;?></td>
		<td style="text-align:center;"><?php echo $date; ?></td>
		<td style="text-align:center;"><input type="submit" name="submit" value="<?php echo $fid; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>
	</tr>
<?php  $y++; } ?>
</form>
</table>
			<br><br>


	<?php
if(isset($_POST['submit'])){
	$fid=$_POST['submit'];
	$ff=1;
	$query=mysql_query("UPDATE farmerrecord SET ncpdelivered='1' WHERE fid='$fid'")or die(mysql_error());
	echo "<script>alert('Ncp Delivery Successfully!!');
		setTimeout(function(){window.location.href='managecerealncpp.php'}, 50);
</script>";
}
?>
</div>
<?php include("footer.php");?>