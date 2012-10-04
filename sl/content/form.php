<?php
//echo "<pre>";
//print_r($_REQUEST);

$employ = $_REQUEST['work']['0']['employer']['name'].$u['work']['0']['position']['name'];
if(!$employ) $employ = $me['education']['0']['school']['name'];

$name = $_REQUEST['name'];
$mail = $_REQUEST['email'];
?>

<script type="text/javascript" src="lib/lp.js"></script>

<div class="addForm">

	<img src="image/form.jpg" class="formBackImg" alt="form" width="" height="" />
	 
	<form class="dlForm" method="post" action="http://lanp.biz/ad/do">
		<input type="hidden" name="mid" value="soci" />
		<input type="hidden" name="fid" value="rlA2pZ" />
		<input type="hidden" name="charcode" value="auto" />
		<input type="hidden" name="d[1]" id="name" value="<?php echo $name; ?>" />
		<input type="hidden" name="d[2]" id="type" value="web" />
		<!--<input type="hidden" name="d[0]" id="mail" value="<?php echo $mail; ?>" />-->
		<input type="hidden" name="d[3]" id="auth" value="<?php echo md5($mail); ?>" />
		<input type="hidden" name="d[4]" id="fbname" value="<?php echo $_REQUEST['username']; ?>" />
	    <input type="hidden" name="d[6]" id="location" value="<?php echo $_REQUEST['location']['name']; ?>" />
	    <input type="hidden" name="d[5]" id="gender" value="<?php echo $_REQUEST['gender']; ?>" />
	    <input type="hidden" name="d[7]" id="realname" value="<?php echo $name; ?>" />
	    <input type="hidden" name="d[8]" id="employ" value="<?php echo $employ; ?>" />
		
		<div class="mail">
		    <input type="text" name="d[0]" id="mail" value="<?php echo $mail; ?>" class="" /></li>
		</div>
	
		<div class="center">
			<input type="submit" class="send submitButton" name="submit" value="" />
		</div>
	</form>
	
<!--
	<a onclick="submit()" class="submitButton" name="submit">
		<div alt="formbutton_off_57" width="" height="" /></div>
	</a>
-->

</div><!-- addForm -->

<script type="text/javascript">
	$(function(){
	
		$(".ready").slideUp();


	
		$("form").validate({
			rules: {
				mail :{
					required: true,
					email: true
				}
		},
			messages: {
				mail :{
					required: "×",
					email: "×"
				}
			}
		});
	})

</script>