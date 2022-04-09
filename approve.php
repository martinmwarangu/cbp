<?php 
include("conn.php");
include("header1.php"); 

$paidamount="";
?>
<div id="content">
 <a href="makepayments.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: red;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 50%;"><span></span> <i>click Here to make  </i><b style="    color: white;font-size: 16px;padding-left: 2%;background: #53668a;border-radius: 10%;
    padding-right: 3%;">payments</b></a>
															

<h3  style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Approve Payments</h3>

	


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
		<td style="text-align:center;">Amount</td>
		<td style="text-align:center;">Total Amount</td>
		<td style="text-align:center;">Paid Amount</td>
		<td style="text-align:center;">Date Delivered</td>
		

	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM farmerrecord WHERE ncpdelivered >'0'")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				$fid=mysql_result($get_fid,$i,'fid');
				 $name=mysql_result($get_fid,$i,'name');
				 $phone=mysql_result($get_fid,$i,'phone');
				 $cerealtype=mysql_result($get_fid,$i,'cerealtype');
				 $paidamount=mysql_result($get_fid,$i,'paidamount');
				 $noofbagsdelivered=mysql_result($get_fid,$i,'noofbagsdelivered');
				 $date=mysql_result($get_fid,$i,'date');
				
				 
 $search_query=("SELECT  price FROM cereals WHERE cerealtype='$cerealtype'")or die(mysql_error());
$count=mysql_query($search_query);

while ($rows=mysql_fetch_array($count))
			{

				 $price=$rows['price'];
				 
				
				 
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255);color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name; ?></td>
		<td style="text-align:center;"><?php echo $phone; ?></td>
		<td style="text-align:center;"><?php echo $cerealtype; ?></td>
		<td style="text-align:center;"><?php echo $noofbagsdelivered;?></td>
		<td style="text-align:center;"><?php echo $price; ?></td>
		 <?php $f=$price*$noofbagsdelivered;?>
		<td style="text-align:center;"><?php echo $f; ?><input type="text" name="paidamount" value="<?php echo $f; ?>" hidden /></td>
		<td style="text-align:center;"><?php echo $paidamount;?></td>
		<td style="text-align:center;"><?php echo $date; ?></td>
				<?php $y++;}} ?>
	</tr>


</table>
</form>			<br><br>


</div>
<?php include("footer.php");?>