<?php 
include("conn.php");
include("header1.php"); 
?>
 <div id="content">
  <a href="info.php" style=" margin-left: 4%; text-decoration: none; background: #22201e;
															color: white;padding-top: 13px;margin-top: -11px;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%; text-align: center;color: red;"><span></span>Back</a>
 
 					<a href="createinformation.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: white;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span>Create Info </a>
					<a href="manageinformation.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: white;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> Manage Info </a>
 
 
 
	<h3 style="    margin-top: 6%; width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36);">Create Information Page</h3>
<?php
if(isset($_POST['submit'])){
	$date=date("d-M-Y");
	$time=date("H:m a");
	$title=$_POST['title'];
	$contents=$_POST['contents'];
	$contents=mysql_real_escape_string($contents);
	$result=mysql_query("SELECT id FROM information");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$get_id=mysql_result($result,$i,'id'); } 
	$id=$get_id+1; 
	
	$query=mysql_query("INSERT INTO information (n_date,n_time,n_title,n_contents,more_info) VALUES ('$date','$time','$title','$contents','$contents')") or die(mysql_error());
	$source = $_FILES['fupload']['tmp_name'];
				$target = "images/".$id.".jpg";
				move_uploaded_file( $source, $target ); 
	
	
	echo "<script>alert('News item created Successfully!!');
		setTimeout(function(){window.location.href='createinformation.php'}, 50);
</script>";
}
?>
	<form action="" enctype='multipart/form-data' id="form" METHOD="POST">
<table border="0" cellspacing="8px" style="background: rgba(68, 66, 33, 0.42);">
<TR>
	<td colspan="2"><p> <i style="color: white;">Use the form below to Edit Information item</a></i></p></td>
</TR>
<TR>
	<td>Info id</td><td><input type="text" required readonly value="
	<?php $result=mysql_query("SELECT id FROM information");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$get_id=mysql_result($result,$i,'id'); } echo $get_id+1; ?> "></td>
</TR>
<TR>	
	<td>Date</td><td><input type="text" required value=<?php echo date("d-M-Y"); ?> readonly></td> 
</TR>
<TR>
	<td>Time</td><td><input type="text" required value=<?php echo date("H:m a"); ?> readonly></td> 
</TR>
<TR>
	<td>Title</td><td><input type="text" required name="title" placeholder="Info Title"></td> 
</TR>
<TR>
	<td>Contents</td><td><textarea  required name="contents" placeholder="Info contents"></textarea></td> 
</TR>
<TR>
	<td>caption Photo(max size 1mb) :</td>
							<td>
								<input type='hidden' name='MAX_FILE_SIZE' value='2000000' />
								<input type='file' name='fupload' class='editmode' size='50' />
							</td>
</TR>
<TR>
<td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="SUBMIT"></td> 
</TR>
</table>
</form>
	
	 </div>
<?php include("footer.php"); ?>