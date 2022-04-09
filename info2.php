<?php include("header2.php");?>
    
    <div id="content">
	<?php if($logedin==1){ ?>
					<a href="createinformation.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: white;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span>Create Info </a>
					<a href="manageinformation.php" style=" margin-left: 21%; padding-left: 8px; text-decoration: none; background: #22201e;
															color: white;padding-top: 13px;margin-top: -11px;text-align: center;margin-right: 4%;
															font-size: 13px;border: solid;border-radius: 12px;float: left;width: 14%;"><span></span> Manage Info </a>
															
															 <h3 style="    margin-top: 6%; width: 40%; margin-left: 31%;background: rgba(142, 147, 76, 0.36);"> Information</h3>

	<?php } ?>														 <?php 
$result=mysql_query("SELECT * FROM information");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$get_id=mysql_result($result,$i,'id'); 
			$date=mysql_result($result,$i,'n_date');
			$time=mysql_result($result,$i,'n_time');
			$title=mysql_result($result,$i,'n_title');
			$contents=mysql_result($result,$i,'n_contents');
?>
		<div class="news_content" style="width:100%;margin-bottom: 0px;min-height: 0px;">
		<div><img src="images/<?php echo $get_id; ?>.jpg" style="width: 25%;float: right;"></div>
		<h1 style="text-align: center;"><?php echo $title;?></h1>
		<h4 style="color: #CDDC39;"><i><?php echo $date;?> | <?php echo $time;?></i><h4>
		<p style="font-family: monospace;font-size: 15px;"><?php echo $contents;?>...</p>
		<form action="" method="POST">
		<input type="hidden" value="<?php echo $get_id; ?>" name="n_item">
		<input type="submit" name="more" value="read-more" style="background: #949c5c; cursor: pointer;color: white;">
		</form>
<?php
if(isset($_POST['more'])){
	$_SESSION['n_item']=$got_id=$_POST['n_item'];
	header("location:more.php");
}
?>
		</div>
<?php } ?>
	</div> 
<?php include("footer.php");?>
