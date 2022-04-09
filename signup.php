<?php 
include("conn.php");
include("header.php"); 
?>
 <div id="content">
	<h3   style="margin-top: 3%;">Create Account</h3>
	<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$u_name=$_POST['uname'];
	$id_num=$_POST['id'];
	$farmno=$_POST['farmno'];
	$farmlocation=$_POST['farmlocation'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$residence=$_POST['residence'];
	$gender=$_POST['gender'];
	$pass=$_POST['password'];
	$sacco=$_POST['sacco'];
	$sql="SELECT * FROM users WHERE username='$u_name'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		echo "<script>alert('Error!!!! Username is already taken please try using a diffent username!!');</script>";
	}
	if($count==0){
	$query=mysql_query("INSERT INTO users (name,id_num,phone,email,residence,sacco,gender,farmno,farmlocation,username,pass,user_level) VALUES ('$name','$id_num','$phone','$email','$residence','$sacco','$gender','$farmno','$farmlocation','$u_name','$pass','8')") or die(mysql_error());

	$query=mysql_query("INSERT INTO farmerrecord (name,id_num,phone,sacco,farmno,farmlocation) VALUES ('$name','$id_num','$phone','$sacco','$farmno','$farmlocation')") or die(mysql_error());

	
	
	
	echo "<script>alert('Your Account has been created Successfully!!');
		setTimeout(function(){
	   window.location.href='index.php'
	}, 50);
	</script>"; }
}
?>
<form action="" id="form" METHOD="POST">
<table border="0" cellspacing="8px">
<TR>
	<td>full Name</td><td><input type="text" required name="name" placeholder="full name"></td>
</TR>
<TR>	
	<td>Id Num</td><td><input type="number" required name="id"style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height: 35%;
    text-align: center;
    color: #18214f;" min="10000" max="99999999" placeholder="Id number"></td> 
</TR>

<TR>
	<td>Phone</td><td><input type="number" required style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height: 35%;
    text-align: center;
    color: #18214f;" name="phone" min="100000" max="9999999999" placeholder="07......"></td> 
</TR>
<TR>
	<td>Email</td><td><input type="email" required style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height: 35%;
    text-align: center;
    color: #18214f;" name="email" placeholder="email address"></td> 
</TR>
<TR>
	<td>Residence</td><td>
	<select required name="residence" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 225px;
	height:30px;
    text-align: center;
    color: #18214f;" placeholder="Town">
	<option value="">--select--</option>
		
	<option value="Baringo">Baringo</option>
	<option value="Bomet">Bomet</option>
	<option value="Bungoma">Bungoma</option>
	<option value="Busia">Busia</option>
	<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
	<option value="Kericho">Kericho</option>
	<option value="Kilifi">Kilifi</option>
	<option value="Kisumu">Kisumu</option>
	<option value="Kitui">Kitui</option>
	<option value="Laikipia">Laikipia</option>
	<option value="Nakuru">Nakuru</option>
	<option value="Nandi">Nandi</option>
	<option value="Narok">Narok</option>
	<option value="Nyeri">Nyeri</option>
	<option value="Uasin Gishu">Uasin Gishu</option>
	</select> 
</TR>
<TR>
	<td>Sacco</td><td>

	<select required name="sacco" style="    background: white;
    width: 91%;
    height: 28px;" placeholder="Sacco">
	<option value="">--select--</option>
		<?php $result=mysql_query("SELECT sacco FROM users WHERE Sacco>'0'");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$sacco=mysql_result($result,$i,'sacco');
			?>
	<option value="<?php echo $sacco;?>"><?php echo $sacco; ?></option>
			<?php }?>
	</select> 
</TR>
<TR>
	<td>Gender </td><td><input type="radio" name="gender" required selected value="male"> Male <input type="radio" name="gender" value="female"> Female</td> 
</TR>
<TR>
<TR>
<TR>	
	<td>Plot No</td><td><input type="text" required name="farmno" style="background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
    text-align: center;
    color: #18214f;" placeholder="Plot No"></td> 
</TR>
<TR>	
	<td>Farm Location</td><td><select  required name="farmlocation"style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 225px;
	height:30px;
    text-align: center;
    color: #18214f;"  placeholder="Farm Location">
	<option value="">--select--</option>
	<option value="Baringo">Baringo</option>
	<option value="Bomet">Bomet</option>
	<option value="Bungoma">Bungoma</option>
	<option value="Busia">Busia</option>
	<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
	<option value="Kericho">Kericho</option>
	<option value="Kilifi">Kilifi</option>
	<option value="Kisumu">Kisumu</option>
	<option value="Kitui">Kitui</option>
	<option value="Laikipia">Laikipia</option>
	<option value="Nakuru">Nakuru</option>
	<option value="Nandi">Nandi</option>
	<option value="Narok">Narok</option>
	<option value="Nyeri">Nyeri</option>
	<option value="Uasin Gishu">Uasin Gishu</option>
	
	
	
	</select> 
</TR>
	<td>Username</td><td><input type="text" required name="uname" placeholder="username" ></td> 
</TR>
<TR>
	<td>Password</td><td><input type="password" style="    background: #c1c1b6;
    padding: 4px 10px;
    width: 206px;
	height: 35%;
    text-align: center;
    color: #18214f;" required name="password" placeholder="password" ></td> 
</TR>
<TR>
<td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="SUBMIT"></td> 
</TR>
</table>
</form>
 </div>
<?php include("footer.php"); ?>