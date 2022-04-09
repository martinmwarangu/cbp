<?php 
include("conn.php");
include("header1.php"); 
		$fid="";
	 	$name="";
		$sacco="";
		$phone="";
		$cerealtype="";
		$noofbagsdelivered="";
		$amount="";
		$paidamount="";
		$price="";
		$ra=0;

?>
 <div id="content">
 
  <a href="approve.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: red;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> Back</a>
															
 
	<h3   style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Make Payments</h3>
	<?php
if(isset($_POST['submit'])){
	$fid=$_POST['fid'];
	$paidamount=$_POST['paidamount'];
	$the=$_POST['the'];
	$ra=$the+$paidamount;
	
	$query=mysql_query("UPDATE farmerrecord SET paidamount='$ra' WHERE fid='$fid'")or die(mysql_error());
	echo "<script>alert('Payments Approved Successfully!!');
		setTimeout(function(){window.location.href='makepayments.php'}, 50);
</script>";
}
?>

	<?php
if(isset($_POST['search'])){

	$phone=$_POST['phone'];
	
$search_query="SELECT * FROM farmerrecord WHERE phone='$phone' AND ncpdelivered=1";
$count=mysql_query($search_query);

while ($rows=mysql_fetch_array($count)){
	$fid=$rows['fid'];
	
		$name=$rows['name'];
		$sacco=$rows['sacco'];
		$phone=$rows['phone'];
		$cerealtype=$rows['cerealtype'];
		$noofbagsdelivered=$rows['noofbagsdelivered'];
		$amount=$rows['amount'];
		$paidamount=$rows['paidamount'];
		
		 $search_query=("SELECT  price FROM cereals WHERE cerealtype='$cerealtype'")or die(mysql_error());
		$count=mysql_query($search_query);

		while ($rows=mysql_fetch_array($count))
					{

						 $price=$rows['price'];
	
}}
	$result=mysql_query($search_query);
	$count=mysql_num_rows($result);
	if($count==0)
	
	{ print '<p style="color:red;text-align: center;">* Wrong Phone Number*</p>';}
}
?>

<form action="" id="form" METHOD="POST">
<table border="0" cellspacing="8px">
<TR>	
	<td colspan="4" style="text-align:center;"><i>enter and search the farmer phone number to approve payments  </i></td>
	
	</TR>
	<TR>	
	<td colspan="4" style="text-align:center;"><b style="font-size:20px;">phone</b></td>
	
	</TR>
	<TR>
	<td colspan="4" style=" text-align:center">
	
	<input type="number"  value="<?php echo $phone;?>" name="phone" style=" background: #f4f4f4;
    padding: 4px 10px; width: 74%; text-align: center;color: #18214f;height: 29px;"  ></td> 
</TR>

<TR>
	<td>Full Name</td><td><input type="text" Readonly value="<?php echo $name;?>" name="name" placeholder="full name"></td>
	<td>Sacco</td><td><input type="text" Readonly value="<?php echo $sacco;?>" name="sacco" placeholder="Sacco"></td>
</TR>

<TR>	
	<td>Cereal Type</td><td><input type="text" readonly value="<?php echo $cerealtype;echo '  cereal.';echo$price;?>" name="cerealtype" style="background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" ></td> 
	<td>No Of Bags Delivered</td><td><input type="Text" readonly value="<?php echo $noofbagsdelivered;?>" name="noofbagsdelivered"style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" ></td>
</TR>
<TR>
	<td>Total Amount</td> <?php $f=$price*$noofbagsdelivered;?> <td><input type="text" Readonly value="<?php echo $f;?>" name="amount" placeholder="amount"></td>
	<td>Payment Made</td><td><input type="text" name="the" value="<?php echo $paidamount;?>" placeholder="Payment"><input type="text" hidden name="fid" value="<?php echo $fid ?>"></td>
</TR>

	<TR>	
	<td colspan="4" style="text-align:center;"><b style="font-size:20px;">Enter Amount To Pay</b></td>
	
	</TR>
	<TR>
	<td colspan="4" style=" text-align:center">
	
	<input type="number"  name="paidamount" style=" background: #f4f4f4;
    padding: 4px 10px; width: 74%; text-align: center;color: #18214f;height: 29px;"  ></td> 
</TR>

<TR><p></p></TR>
<TR>
<td colspan="4" style=" text-align: center;padding-right: 10%;"><input type="submit" name="search" value="search"  style="text-align:center; width: 30%;margin-left: 7%; background: green;
    border: none; color: white;font-size: 18px;"><input type="submit" name="submit" value="SUBMIT"  style="width: 30%;text-align:center; margin-left: 7%; background:#213458;
    border: none; color: white;font-size: 18px;"></td> 
</TR>

</table>
</form>
 </div>
<?php include("footer.php"); ?>