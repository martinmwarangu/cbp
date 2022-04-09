<?php 
include("conn.php");
include("header.php"); 
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
 <h3 style="    margin-top: 2%;">Our Location</h3>
				<div style="float:left;
							padding:10px 0 0 120px;">
				<span style="background-color:rgb(71, 71, 71);
								padding:4px 10px 4px 10px;
								font-family:serif;
								color:white;">pos.google maps</span>
				</div>
				<br>
				<div style="border: 1px rgb(77, 64, 64) dashed;
							width: 73%;
							float: left;
							margin:20;
							margin-left: 3%;">
				<form action="" method="POST" style = "background-image:  url(images/l.png);  height: 340px;width:100%">

				
					
				</form >

				</div>
				<br>
								<form style="float:right;width:150px;">
				<p>
				Goverment Road ,PSP Bulding , 2nd floor.<br>
				opening Hours ,8AM - 6PM,
							<BR>MONDAY -SATURDAY
				<p>
				</form>
 
</div>
<?php include("footer.php"); ?>