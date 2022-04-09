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
   docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<div id="content">
<h3>Reports</h3>
<a  style="padding: 0px 10px;float: right;margin-bottom: 13px; margin-top: 10px;color: #0013ff;
    background: white; border-bottom-left-radius: 12px; font-size: 15px;
    font-weight: bold" a href="javascript:Clickheretoprint()">Print this report</a>
<?php
 if(isset($_POST['go'])){
	 $id_set=$_POST['qry']?>
	 
 <!----------------------------------------------------------------------------------------------------------->
<?php if($id_set==3){ ?> 
 <form action="" method="POST" id="print_content" >
  <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%;" colspan="9">Leave Request REPORT</td> 	
	</tr>
	<tr style=" background: #213458; color:white;">
		<td style="text-align:center;width:20;">#</td> 
		<td style="text-align:center;width:20;">Name</td> 
		<td style="text-align:center;">Department</td>
		<td style="text-align:center;"> Reason </td>
		<td style="text-align:center;"> Date From </td>
		<td style="text-align:center;">Date To</td>
		<td style="text-align:center;">Status</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM bleave Order BY status asc")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $name=mysql_result($get_fid,$i,'name');
				 $username=mysql_result($get_fid,$i,'username');
				 $department=mysql_result($get_fid,$i,'department');
				 $reason=mysql_result($get_fid,$i,'reason');
				 $dfrom=mysql_result($get_fid,$i,'dfrom');
				 $dto=mysql_result($get_fid,$i,'dto');
				 $status=mysql_result($get_fid,$i,'status');
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255); color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name;echo ' - '; echo $username ?></td>
		<td style="text-align:center;"><?php echo $department; ?></td>
		<td style="text-align:center;"><?php echo $reason; ?></td>
		<td style="text-align:center;"><?php echo $dfrom; ?></td>
		<td style="text-align:center;"><?php echo $dto;?></td>
		<td style="text-align:center;"><?php echo $status; ?></td>	
	</tr>
<?php
$y++; }
?>
</table>
</form>
</div>
</div>
<?php include("footer.php");?>	
</body>
</html>
<?php die;} ?>
 <?php if($id_set==2){ ?> 
 <form action="" method="POST" id="print_content" >
  <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%; " colspan="9">Short-Listed Job Applicants</td> 	
	</tr>
	<tr style=" background:#213458; color:white;">
		<td style="text-align:center;width:20;">#</td> 
		<td style="text-align:center;width:20;">Name</td> 
		<td style="text-align:center;">Email</td>
		<td style="text-align:center;"> Phone Number </td>
		<td style="text-align:center;"> City </td>
		<td style="text-align:center;">Position</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM jobaplication WHERE status='Short Listed' ")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $fname=mysql_result($get_fid,$i,'fname');
				 $lname=mysql_result($get_fid,$i,'lname');
				 $email=mysql_result($get_fid,$i,'email');
				 $phone=mysql_result($get_fid,$i,'phone');
				 $city=mysql_result($get_fid,$i,'city');
				 $position=mysql_result($get_fid,$i,'position');
				 
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255);color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $fname;echo ' ';echo $lname; ?></td>
		<td style="text-align:center;"><?php echo $email; ?></td>
		<td style="text-align:center;"><?php echo $phone; ?></td>
		<td style="text-align:center;"><?php echo $city; ?></td>
		<td style="text-align:center;"><?php echo $position;?></td>
	</tr>
<?php
$y++; }
?>
</table>
</form>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
<?php die;} ?>
<?php if($id_set==1){ ?>
 <form action="" method="POST" id="print_content" >
 <table style="margin:auto;"border="1" width="97%">
	<tr>
		<td style="text-align:center;width:20;width: 96%;" colspan="9"> Expense Report</td> 	
	</tr>
	<tr style=" background: #213458; color:white;">
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
	<tr style="font-family:serif;background-color: rgb(255, 255, 255);color: black;font-size: 15px;text-align:left;">
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
</form>
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