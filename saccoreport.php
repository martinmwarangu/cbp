<?php 
include("conn.php");
include("header2.php"); 
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
		<td style="text-align:center;width:20;width: 96%;" colspan="9">Paid Deliveries</td> 	
	</tr>
	<tr style=" background: #213458; color:white;">
		<td style="text-align:center;width:20;">#</td> 
		<td style="text-align:center;width:20;">Name</td> 
		<td style="text-align:center;">phone</td>
		<td style="text-align:center;"> Cereal Type </td>
		<td style="text-align:center;"> No Of Bags</td>
		<td style="text-align:center;">Paid Amount</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT *FROM farmerrecord WHERE sacco='$use_sacco' AND paidamount>0 ")or die(mysql_error());
	 $num_fid=mysql_num_rows($get_fid);
	 $y=1;
	 $tot=0;
		for($i=0;$i<$num_fid;$i++)
			{
				 $name=mysql_result($get_fid,$i,'name');
				 $phone=mysql_result($get_fid,$i,'phone');
				 $cerealtype=mysql_result($get_fid,$i,'cerealtype');
				 $noofbagsdelivered=mysql_result($get_fid,$i,'noofbagsdelivered');
				 $paidamount=mysql_result($get_fid,$i,'paidamount');
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255); color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name ?></td>
		<td style="text-align:center;"><?php echo $phone; ?></td>
		<td style="text-align:center;"><?php echo $cerealtype; ?></td>
		<td style="text-align:center;"><?php echo $noofbagsdelivered; ?></td>
		<td style="text-align:center;"><?php echo $paidamount;?></td>
	
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
		<td style="text-align:center;width:20;width: 96%; " colspan="9">Grains Delivered To NCP</td> 	
	</tr>
		<td style="text-align:center;width:20;">id</td> 
		<td style="text-align:center;">Name</td>
		<td style="text-align:center;">Phone</td>
		<td style="text-align:center;"> Cereal Type </td>
		<td style="text-align:center;">No of Bags</td>
		<td style="text-align:center;">Date Delivered</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM farmerrecord WHERE sacco='$use_sacco' AND ncpdelivered =1 ")or die(mysql_error());
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
				 $tot +=$noofbagsdelivered;
				 
?>
	<tr style="font-family:serif;background-color: rgb(255, 255, 255);color: black;font-size: 15px;text-align:left;">
		<td style="text-align:center;"><?php echo $y; ?></td>
		<td style="text-align:center;"><?php echo $name; ?></td>
		<td style="text-align:center;"><?php echo $phone; ?></td>
		<td style="text-align:center;"><?php echo $cerealtype; ?></td>
		<td style="text-align:center;"><?php echo $noofbagsdelivered;?></td>
		<td style="text-align:center;"><?php echo $date; ?></td>
	</tr>
<?php
$y++; }
?>
<tr>
	<td colspan='4' style ="text-align: right;
    background: rgba(43, 31, 12, 0.54);
    color: white;
    font-family: cursive;
    font-size: 19px;
    padding: 10px;">Total Number Of Bags</td>
	
	<td style="font-size: 34px;
    font-family: sans-serif;"><?php echo $tot; ?> </td></tr>

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
		<td style="text-align:center;width:20;width: 96%;" colspan="9">Grains Delivered By Farmers</td> 	
	</tr>
	<tr style=" background: #213458; color:white;">
		<td style="text-align:center;width:20;">id</td> 
		<td style="text-align:center;">Name</td>
		<td style="text-align:center;">Phone</td>
		<td style="text-align:center;"> Cereal Type </td>
		<td style="text-align:center;">No of Bags</td>
		<td style="text-align:center;">Date Delivered</td>
		<td style="text-align:center;">Deliver To NCPB</td>
	</tr>
<?php

$get_fid=mysql_query("SELECT * FROM farmerrecord WHERE sacco='$use_sacco' AND noofbagsdelivered>0 ")or die(mysql_error());
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
 <?php die; } }?>
	<form action="" method="POST">
	<table border="0" cellspacing="8" style="width: 55%;margin: auto;font-weight:bold;margin-top: 54px;text-align:center;">
						<tr>
							<td colspan="2" >SELECT QUERY TO PRODUCE REPORT </td>
						</tr>
						<tr>
							<td><select name="qry" required="" style="width: 230px;height: 25px;text-align: center;" >
									<option value="">---select---</option>
									<option value="1">Grains Delivered By Farmers</option>
									<option value="2">Grains Delivered To NCPB</option>
									<option value="3">Paid Deliveries</option>
								</select>
							<td><input type="SUBMIT" value="Generate Report"  name="go" id="go"style="margin-top: 0px;padding: 8px 30px;background: #3d9db3;color: white;"></td>
						</tr>
					</table>
</form>
 <!------------------------------------------------------------------------------------------------------------>
</div>
</div>
<?php include("footer.php");?>