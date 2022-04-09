<?php 
include("conn.php");
include("header1.php"); 
?>
 <div id="content">
 <div class="all_info">
 <?php
 $item_id=$_SESSION['n_item'];
 $result=mysql_query("SELECT * FROM information WHERE id='$item_id'");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$get_id=mysql_result($result,$i,'id'); 
			$date=mysql_result($result,$i,'n_date');
			$time=mysql_result($result,$i,'n_time');
			$title=mysql_result($result,$i,'n_title');
			$more_content=mysql_result($result,$i,'more_info');
			}
 ?>
	<h3>Headline : <?php echo $title; ?></h3>
	<img style="    width: 500px;
    height: 300px;
    margin-top: 26px;
    border: 3px #474747 solid;
    float: left;    
	margin-right: 18px;
    margin-bottom: 12px;" src="images/<?php echo $get_id; ?>.jpg">
	 <h1 style="margin-top: 28px;"><?php echo $title;?></h1><br><h4><i><?php echo $date;?> | <?php echo $time;?></i></h4><br><p style=" 
    font-size: 14px;
    font-family: cursive;
    text-align: justify;margin-bottom: 50px;"><?php echo $more_content;?></p>
	<div id="comments">
		<h3>Comments</h3>
<?php
 $result1=mysql_query("SELECT * FROM comments WHERE pa_id='$item_id'");
		$count1=mysql_num_rows($result1);
			for($i1=0;$i1<$count1;$i1++){
			$comment=mysql_result($result1,$i1,'comment'); 
			$date=mysql_result($result1,$i1,'c_date');
			$time=mysql_result($result1,$i1,'c_time');
			$from=mysql_result($result1,$i1,'c_from');
			
?>
		<p style="border: 1px #474747 dashed;
    padding: 4px 84px;
    margin-top: 17px;
    background: #8c8989;
    margin-bottom: 23px;"><i style="color: #ffc107;"><?php echo $from;?></i><br>
		<?php echo $comment;?> <br><i style="margin-left: 440px;color: #ffc107;"><?php echo $date;?> | <?php echo $time;?></i></p>
<?php } if($logedin!=0) {?>
		<form action="" method="POST" style=" width: 423px;margin: auto;">
			<textarea rows="4" style=" width: 290px;" placeholder="type your comment here" name="comment_val"></textarea>
			<input type="submit" name="comment" value="send comment">
		</form>
<?php
}
if(isset($_POST['comment'])){
$comment=$_POST['comment_val'];	
$comment=mysql_real_escape_string($comment);
$date=date("d-M-Y");
$time=date("H:m a");
$query=mysql_query("INSERT INTO comments (pa_id,comment,c_from,c_date,c_time) VALUES ('$item_id','$comment','$use_name','$date','$time')") or die(mysql_error());
header("location:more.php");
}
?>
	</div>
	<a href="info.php" style="background: #474747;
    padding: 5px 23px;"> << Go Back</a>
</div>
</div> 
<?php include("footer.php");?>