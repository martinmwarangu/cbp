<?php 
include("conn.php");
include("header2.php"); 
?>
<script>
	function isEqual(str1,str2) 
		 {
		   if(str1==str2)
		   {		
			return true;
		   } else {
			return false;
		   }
		}
		
		/*----------------------password-------------------*/
		function done(){
 if(document.getElementById("change_cur").value=="" )
  {
   alert("Enter your Password !!");
   document.getElementById("change_cur").value = "";
   document.getElementById("change_new").value = "";
   document.getElementById("change_new_re").value = "";
   document.getElementById("change_cur").focus();
   return false;
  }
  if(document.getElementById("change_new").value=="" ||document.getElementById("change_new_re").value=="")
  {
   alert("Enter your New Password !!");
   document.getElementById("change_new").value = "";
   document.getElementById("change_new_re").value = "";
   document.getElementById("change_new").focus();
   return false;
  }
  if(isEqual(document.getElementById("change_new").value,document.getElementById("change_new_re").value)== false){
     alert("Password does not match Re-Enter again !!");
     document.getElementById("change_new").value = "";
     document.getElementById("change_new_re").value = "";
     document.getElementById("change_new").focus();
     return false;
    }
  }
	</script>
<div id="content">
 <h3 style="    margin-top: 6%; width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36);">Change Password</h3>
				<div style="float:left;
							padding:10px 0 0 120px;">
				<span style="background-color:rgb(71, 71, 71);
								padding:4px 10px 4px 10px;
								font-family:serif;
								color:white;">Change Password</span>
				</div>
				<br>
				<div style="border: 1px rgb(77, 64, 64) dashed;
							width: 72%;
							margin:20;
							margin:auto;">
				<form action="" method="POST">
				<table cellspacing="15" border="0" style="color: rgb(71, 71, 71); font-family:serif;padding:50px 50px 50px 0px;font-size:16px;">
				<tr>
					<td style="color: white;">Enter current password</td>
					<td><input type="password" id="change_cur" name="change_cur" onChange="document.getElementById('change_cur').value=trim(this.value);"></td>
				</tr>
<?php
if(isset($_POST['pas_save'])){
$cur_pass=$_POST['change_cur'];
$get_pass=mysql_query("SELECT pass FROM users WHERE username='$use_name'")or die (mysql_error());
$pass_count=mysql_num_rows($get_pass);
for($i=0;$i<$pass_count;$i++)
{
$result=mysql_result($get_pass,$i,'pass') ;
}
	if($result==$cur_pass){
		$new_pass=$_POST['change_new'];
		$query=mysql_query("UPDATE  users SET  pass = '$new_pass' WHERE  username='$use_name'")or die(mysql_error());
			echo "<script>alert('Password changed Successfully!!');
		setTimeout(function(){window.location.href='index.php'}, 50);
</script>";
		}
		
			else{
?>
		<tr><td></td><td colspan="2"style="text-align:center;color:red;font-size:13px;">* wrong password !!! *</td><tr>
<?php
}}
?>
				<tr>
					<td style="color: white;">Enter new password</td>
					<td><input type="password" id="change_new" name="change_new" onChange="document.getElementById('change_new').value=trim(this.value);"></td>
				</tr>
				<tr>
					<td style="color: white;">Re-enter new password</td>
					<td><input type="password" id="change_new_re" name="change_new_re" onChange="document.getElementById('change_new_re').value=trim(this.value);"></td>
				</tr>
				</table>
					<span style="padding-left:150px;"><input type="submit" value="Save New Password" id="pas_save" name="pas_save" style="    height: 35px;
    color: rgb(71, 71, 71);
    margin-left: 58px;
    margin-bottom: 20px;" Onclick="return done(this.form);"></span>
				</form>

				</div>
				<br>
 
</div>
<?php include("footer.php"); ?>