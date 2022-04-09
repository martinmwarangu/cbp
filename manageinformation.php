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
					
 
  <h3 style="    margin-top: 6%; width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36);">Delete Information</h3>
 <form action="" method="POST">
	<table border="1" style="    color: black;
    width: 100%;
    margin: auto;
    text-align: center;
    margin-top: 20px;
    background: white;">
		<tr style="background: #0c0a06;;color:white;height: 28px;">
		<td>#</td>
		<td>Title</td>
		<td>info ID</td>
		<td>Date Posted</td>
		<td>Delete</td>
		</tr>
<?php
$x=1;
 $result1=mysql_query("SELECT * FROM information ");
		$count1=mysql_num_rows($result1);
			for($i1=0;$i1<$count1;$i1++){
			$title=mysql_result($result1,$i1,'n_title'); 
			$id=mysql_result($result1,$i1,'id');
			$date=mysql_result($result1,$i1,'n_date');/*background:url(images/del2.png)no-repeat*/
?>
		<tr style="text-align: left;">
			<td><?php echo $x; ?></td>
			<td><?php echo $title; ?></td>
			<td><?php echo $id; ?></td>
			<td><?php echo $date; ?></td>
			
			<td><input type="submit" name="submit" value="<?php echo $id; ?>" style="background: rgb(128, 128, 53);color: rgb(128, 128, 53);width: 100%;"></td>
		<tr>
<?php $x++; } ?>
	</table>
 </form>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['submit'];
	$query=mysql_query("DELETE FROM information WHERE id='$id'")or die(mysql_query());
	echo "<script>alert('info item Deleted Successfully!!');
		setTimeout(function(){window.location.href='manageinformation.php.'}, 50);
</script>";
}
?>
 </div>
<?php include("footer.php");?>