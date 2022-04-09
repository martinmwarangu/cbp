<?php 
include("conn.php");
include("header.php"); 
?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>



<div id="content">
<h3>Reports</h3>
<?php
 if(isset($_POST['go'])){
	 $id_set=$_POST['qry']?>
	 <a  style="padding: 0px 10px;
    float: left;
    margin-bottom: 10px;" href="javascript:window.print()">Print this report</a>
 <!----------------------------------------------------------------------------------------------------------->
<?php if($id_set==3){ ?> 
  <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%;" colspan="9">All Idle Tracks</td> 	
	</tr>
	<tr style=" background: #fffa4a;">
		<td style="text-align:center;width:20;">#</td> 
		<td style="text-align:center;width:20;">Track id</td> 
		<td style="text-align:center;">Licence ID</td>
		<td style="text-align:center;"> Phone Number </td>
		<td style="text-align:center;"> Number Plate </td>
		<td style="text-align:center;">Truck Weight</td>
		<td style="text-align:center;">Truck Description</td>
		<td style="text-align:center;width:120px;">Status</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM addtruck WHERE status='0' ")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $username=mysql_result($get_fid,$i,'name');
				 $mobile=mysql_result($get_fid,$i,'licenceid');
				 $amount=mysql_result($get_fid,$i,'phone');
				 $plate=mysql_result($get_fid,$i,'plateno');
				 $transactioncode=mysql_result($get_fid,$i,'tweight');
				 $date=mysql_result($get_fid,$i,'truckdescrption');
				 $time=mysql_result($get_fid,$i,'dispatchedto');
				 
				 $tot+=$amount;
?>
	<tr style="font-family:serif;background-color: rgb(0, 49, 57);color: white;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $username; ?></td>
		<td style="text-align:center;"><?php echo $mobile; ?></td>
		<td style="text-align:center;"><?php echo $plate; ?></td>
		<td style="text-align:center;"><?php echo $amount; ?></td>
		<td style="text-align:center;"><?php echo $transactioncode;?></td>
		<td style="text-align:center;"><?php echo $date; ?></td>	
		<td style="text-align:center;">Idle</td>
	</tr>
<?php
$y++; }
?>
</table>
</div>
</div>
<div Class="Footer">
<p style="margin-left: 30%;">&copy;Copyright 2018&bull;All Rights Reserved&bull;Company Name RunTime Oloo streate 13100&bull;0795948502</p>
</div>	
</body>
</html>
<?php die;} ?>
 <?php if($id_set==2){ ?> 
  <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%;" colspan="9">All Tracks on Duty</td> 	
	</tr>
	<tr style=" background: #fffa4a;">
		<td style="text-align:center;width:20;">#</td> 
		<td style="text-align:center;width:20;">Track id</td> 
		<td style="text-align:center;">Licence ID</td>
		<td style="text-align:center;"> Phone Number </td>
		<td style="text-align:center;"> Number Plate </td>
		<td style="text-align:center;">Truck Weight</td>
		<td style="text-align:center;">Truck Description</td>
		<td style="text-align:center;width:120px;">Dispatched to</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM addtruck WHERE status!='0' ")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $username=mysql_result($get_fid,$i,'name');
				 $mobile=mysql_result($get_fid,$i,'licenceid');
				 $amount=mysql_result($get_fid,$i,'phone');
				 $plate=mysql_result($get_fid,$i,'plateno');
				 $transactioncode=mysql_result($get_fid,$i,'tweight');
				 $date=mysql_result($get_fid,$i,'truckdescrption');
				 $time=mysql_result($get_fid,$i,'dispatchedto');
				 
				 $tot+=$amount;
?>
	<tr style="font-family:serif;background-color: rgb(0, 49, 57);color: white;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $username; ?></td>
		<td style="text-align:center;"><?php echo $mobile; ?></td>
		<td style="text-align:center;"><?php echo $plate; ?></td>
		<td style="text-align:center;"><?php echo $amount; ?></td>
		<td style="text-align:center;"><?php echo $transactioncode;?></td>
		<td style="text-align:center;"><?php echo $date; ?></td>	
		<td style="text-align:center;"><?php echo $time; ?></td>
	</tr>
<?php
$y++; }
?>
</table>
</div>
</div>
<div Class="Footer">
<p style="margin-left: 30%;">&copy;Copyright 2018&bull;All Rights Reserved&bull;Company Name RunTime Oloo streate 13100&bull;0795948502</p>
</div>	
</body>
</html>
<?php die;} ?>
<?php if($id_set==1){ ?>
 <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%;" colspan="9"> Expense Report</td> 	
	</tr>
	<tr style=" background: #fffa4a;">
		<td style="text-align:center;width:20;">id</td> 
		<td style="text-align:center;">Signed By</td>
		<td style="text-align:center;">Date signed</td>
		<td style="text-align:center;"> Item </td>
		<td style="text-align:center;">Quantity</td>
		<td style="text-align:center;">Cost</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM expense ")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $name=mysql_result($get_fid,$i,'name');
				 $Date=mysql_result($get_fid,$i,'Date');
				 $item=mysql_result($get_fid,$i,'item');
				 $quantity=mysql_result($get_fid,$i,'quantity');
				 $cost=mysql_result($get_fid,$i,'cost');
				 
				 $tot+=$cost;
?>
	<tr style="font-family:serif;background-color: rgb(0, 49, 57);color: white;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name; ?></td>
		<td style="text-align:center;"><?php echo $Date; ?></td>
		<td style="text-align:center;"><?php echo $item; ?></td>
		<td style="text-align:center;"><?php echo $quantity;?></td>
		<td style="text-align:center;"><?php echo $cost; ?></td>	
	</tr>
<?php
$y++; }
?>
<tr style="font-family:serif;background-color: rgb(0, 49, 57);color: white;">
		<td style="text-align:center;" colspan="5">Total Amount</td>
		<td style="text-align:center;"><?php echo $tot; ?></td>
	</tr>
</table>
</div>
</div>
<?php include("footer.php");?>	
</body>
</html>
 <?php die; } }?>
	<form action="" method="POST">
	<table border="0" cellspacing="8" style="width: 55%;margin: auto;font-weight:bold;margin-top: 54px;text-align:center;">
						<tr>
							<td colspan="2" >SELECT QUERY TO PRODUCE REPORT </td>
						</tr>
						<tr>
							<td><select name="qry" required="" style="width: 230px;height: 25px;text-align: center;" >
									<option value="">---select---</option>
									<option value="1">All Expense Report</option>
									<option value="2">Short-Listed Job Applicants</option>
									<option value="3">List Of Leave Request Applicants Reports</option>
									
								</select>
							<td><input type="SUBMIT" value="Generate Report"  name="go" id="go"style="margin-top: 0px;padding: 8px 30px;background: #3d9db3;color: white;"></td>
						</tr>
					</table>
</form>
 <!------------------------------------------------------------------------------------------------------------>
</div>
</div>
<?php include("footer.php");?>