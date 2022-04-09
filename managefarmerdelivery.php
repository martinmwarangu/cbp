<?php 
include("conn.php");
include("header2.php"); 

	 	$name="";
		$email="";
		$phone="";
		$id_num="";
		$farmno="";
		$farmlocation="";


?>
 <div id="content">
 
 <a href="managecerealncpp.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: red;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> Send To Ncp</a>
															
															
 
	<h3   style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Farmer Verification Form</h3>
	<?php
if(isset($_POST['insert'])){
	
	
	$name=$_POST['name'];
	$id_num=$_POST['id_num'];
	$phone=$_POST['phone'];
	$farmno=$_POST['farmno'];
	$farmlocation=$_POST['farmlocation'];
	$cerealtype=$_POST['cerealtype'];
	$noofbagsdelivered=$_POST['noofbagsdelivered'];
	$day=$_POST['day'];
	$date=$_POST['date'];
	
	$query=mysql_query("INSERT INTO farmerrecord (name,id_num,phone,farmno,farmlocation,sacco,cerealtype,noofbagsdelivered,day,date) VALUES ('$name','$id_num','$phone','$farmno','$farmlocation','$use_sacco','$cerealtype','$noofbagsdelivered','$day','$date')") or die(mysql_error());

	echo "<script>alert('Farmer Delivery Successfully!!');
		setTimeout(function(){
	   window.location.href='managefarmerdelivery.php'
	}, 50);
	</script>"; 
}
?>

	<?php
if(isset($_POST['search'])){

	$id_num=$_POST['id_num'];
	
$search_query="SELECT * FROM users WHERE id_num='$id_num'";
$count=mysql_query($search_query);

while ($rows=mysql_fetch_array($count)){
	
	 	$name=$rows['name'];
		$email=$rows['email'];
		$phone=$rows['phone'];
		$nid=$rows['id_num'];
		$farmno=$rows['farmno'];
		$farmlocation=$rows['farmlocation'];

	}
	$result=mysql_query($search_query);
	$count=mysql_num_rows($result);
	if($count==0)
	
	{ print '<p style="color:red;text-align: center;">* Enter correct ID number*</p>';}
}
?>

<form action="" id="form" METHOD="POST">
<table border="0" cellspacing="8px">
<TR>	
	<td>Id Num</td><td><input type="number"  value="<?php echo $id_num;?>" name="id_num" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height:25PX;
    text-align: center;
    color: #18214f;" min="10000" max="99999999" placeholder="Id number"></td> 
</TR>

<TR>
	<td>full Name</td><td><input type="text" Readonly value="<?php echo $name;?>" name="name" placeholder="full name"></td>
</TR>

<TR>
	<td>Phone</td><td><input type="number" readonly value="<?php echo $phone;?>"  style=" background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;height:25PX;
    text-align: center;
    color: #18214f;" name="phone"  placeholder="Phone"></td> 
</TR>
<TR>	
	<td>Farm No</td><td><input type="text" readonly value="<?php echo $farmno;?>" name="farmno" style="background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" placeholder="Farm No"></td> 
</TR>
<TR>	
	<td>Farm Location</td><td><input type="Text" readonly value="<?php echo $farmlocation;?>" name="farmlocation" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;"  placeholder="Farm Location"></td> 
</TR>
<TR>	
		<td>Cereal Type</td><td><select name="cerealtype"  style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height:30PX;
    text-align: center;
    color: #18214f;">
		<option value="">--select--</option>
<?php
$get_all=mysql_query("SELECT * FROM cereals Order BY cerealtype asc")or die (mysql_error());
$all_count=mysql_num_rows($get_all);
$x=1; 
for($h=0;$h<$all_count;$h++)
	 {

	 $cerealtype=mysql_result($get_all,$h,'cerealtype');
	 $price=mysql_result($get_all,$h,'price');

?>
		<option value="<?php echo $cerealtype ;?>"><?php echo $cerealtype; ?></option>
<?php
	 }
?>
		</select>
		</td>
</TR>
<TR>	
	<td>No.of Bags</td><td><input type="number"  name="noofbagsdelivered" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" min = "100" max = "99999" </td>
</TR>
<TR>	
	<td>Day </td><td><input type="Text" readonly value="<?php echo date("l");?>" name="day"style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" ></td> 
</TR>
<TR>	
	<td>Date</td><td><input type="Text" readonly value="<?php echo date("M,d,Y");?>" name="date" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;"  placeholder="date"></td> 
</TR>
<TR><p></p></TR>
<TR>
<td colspan="2" style=" text-align: right;padding-right: 10%;"><input type="submit" name="search" value="search"  style="text-align:center;  margin-left: 7%; background: green;
    border: none; color: white;font-size: 18px;"><input type="submit" name="insert" value="Admit Delivery"  style="text-align:center; margin-left: 7%; background:#213458;
    border: none; color: white;font-size: 18px;"></td> 
</TR>

</table>
</form>
 </div>
<?php include("footer.php"); ?>