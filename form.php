<?php
//sleep(5);
?>

<div class="addForm">

	<img src="image/form.jpg" class="formBackImg" alt="form" width="" height="" />
	 
	<form class="dlForm" method="post" action="http://lanp.biz/ad/do">
		<input type="hidden" name="mid" value="soci" />
		<input type="hidden" name="fid" value="rlA2pZ" />
		<input type="hidden" name="charcode" value="auto" />
		<input type="hidden" name="d[1]" id="name" value="" />
		<input type="hidden" name="d[2]" id="name" value="web" />
		<input type="hidden" name="d[0]" id="mail" value="" />
		<input type="hidden" name="d[3]" id="auth" value="" />
		<input type="hidden" name="d[4]" id="username" value="" />
	    <input type="hidden" name="d[6]" id="location" value="" />
	    <input type="hidden" name="d[5]" id="gender" value="" />
	    <input type="hidden" name="d[7]" id="realname" value="" />
		
		
		<ul>
		  <li class="name">
		    <input type="text" name="name" id="name" value="" class="" />
		  </li>
		  </tr>
		  <li class="mail">
		    <input type="text" name="mail" id="mail" value="" class="" /></li>
		  </li>
		</ul>
	
		<div class="center">
			<input type="submit" class="send" style="display: none;" name="submit" value="登録" />
		</div>
	</form>
	
	<a onclick="submit()" class="submitButton" name="submit">
		<div alt="formbutton_off_57" width="" height="" /></div>
	</a>


</div><!-- addForm -->

<script type="text/javascript">
	$(function(){
		$("form").validate({
			rules: {
				name :{
					required: true
				},
				mail :{
					required: true,
					email: true
				}
		},
			messages: {
				name :{
					required: "×"
				},
				mail :{
					required: "×",
					email: "×"
				}
			}
		});
	})
</script>