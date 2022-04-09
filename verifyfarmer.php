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
 
  <a href="manageverifysaccomembers.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: red;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> Members</a>
															
 
	<h3   style="width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36); margin-top: 5%;">Farmer Verification Form</h3>
	<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$id_num=$_POST['id_num'];
	$phone=$_POST['phone'];
	$farmno=$_POST['farmno'];
	$farmlocation=$_POST['farmlocation'];

	
	$sql="SELECT * FROM farmerrecord WHERE id_num='$id_num'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		echo "<script>alert('Error!!!! Already Member!!');</script>";
	}
	if($count==0){
	$query=mysql_query("INSERT INTO farmerrecord (name,id_num,phone,farmno,farmlocation,sacco) VALUES ('$name','$id_num','$phone','$farmno','$farmlocation','$use_sacco')") or die(mysql_error());

	echo "<script>alert('Farmer verification Successfully!!');
		setTimeout(function(){
	   window.location.href='verifyfarmer.php'
	}, 50);
	</script>"; }
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
	
	{ print '<p style="color:red;text-align: center;">* User Not Ncp Registered *</p>';}
}
?>

<form action="" id="form" METHOD="POST">
<table border="0" cellspacing="8px">
<TR>	
	<td>Id Num</td><td><input type="number"  value="<?php echo $id_num;?>" name="id_num" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;"  placeholder="Id number"></td> 
</TR>

<TR>
	<td>full Name</td><td><input type="text" Readonly value="<?php echo $name;?>" name="name" placeholder="full name"></td>
</TR>

<TR>
	<td>Phone</td><td><input type="number" readonly value="<?php echo $phone;?>"  style=" background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" name="phone"  placeholder="Phone"></td> 
</TR>
<TR>	
	<td>Farm No</td><td><input type="text" readonly value="<?php echo $farmno;?>" name="farmno" style="background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" placeholder="Id number"></td> 
</TR>
<TR>	
	<td>Farm Location</td><td><input type="Text" readonly value="<?php echo $farmlocation;?>" name="farmlocation"style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;"  placeholder="Id number"></td> 
</TR>
<TR><p></p></TR>
<TR>
<td colspan="2" style=" text-align: right;padding-right: 10%;"><input type="submit" name="search" value="search"  style="text-align:center;  margin-left: 7%; background: green;
    border: none; color: white;font-size: 18px;"><input type="submit" name="submit" value="SUBMIT"  style="text-align:center; margin-left: 7%; background:#213458;
    border: none; color: white;font-size: 18px;"></td> 
</TR>

</table>
</form>
 </div>
<?php include("footer.php"); ?>