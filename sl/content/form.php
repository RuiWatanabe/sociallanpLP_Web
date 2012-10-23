<?php
require '../config.php';
require '../system/sdk/facebook.php';

$facebook = new Facebook(array(
    'appId' => APP_ID,
    'secret' => APP_SECRET
));

$facebook->setAccessToken($_REQUEST['token']); //ログインしているかどうかをチェック。している場合ユーザIDを返す。
$u = $facebook->api("/me&locale=ja_JP");


$employ = $u['work']['0']['employer']['name'].$u['work']['0']['position']['name'];
if(!$employ) $employ = $u['education']['1']['school']['name'];
if(!$employ) $employ = $u['education']['0']['school']['name'];
?>

<script type="text/javascript" src="lib/lp.js"></script>

<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-35744038-1']);
_gaq.push(['_setDomainName', 'lastlanp.jp']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>


<div class="addForm">

	<img src="image/form.png" class="formBackImg" />
	 
	<form class="dlForm" method="post" action="http://lanp.biz/ad/do" onsubmit="_gaq.push(['_linkByPost', this]);">
		<input type="hidden" name="mid" value="soci" />
		<input type="hidden" name="fid" value="rlA2pZ" />
		<input type="hidden" name="charcode" value="auto" />
		<input class="formdata" type="hidden" name="d[1]" id="name" value="<?php echo $u['name']; ?>" />
		<input class="formdata" type="hidden" name="d[2]" id="type" value="web" />
		<!--<input type="hidden" name="d[0]" id="mail" value="<?php echo $mail; ?>" />-->
		<input class="formdata" type="hidden" name="d[3]" id="auth" value="<?php echo md5($u['username']); ?>" />
		<input class="formdata" type="hidden" name="d[4]" id="fbname" value="<?php echo $u['username']; ?>" />
	    <input class="formdata" type="hidden" name="d[6]" id="location" value="<?php echo $u['location']['name']; ?>" />
	    <input class="formdata" type="hidden" name="d[5]" id="gender" value="<?php echo $u['gender']; ?>" />
	    <input class="formdata" type="hidden" name="d[7]" id="fbmail" value="<?php echo $u['email']; ?>" />
	    <input class="formdata" type="hidden" name="d[8]" id="employ" value="<?php echo $employ; ?>" />
	    <input class="formdata" type="hidden" name="id" id="id" value="<?php echo $u['id']; ?>" />
		
		<div class="mail">
		    <input class="formdata" type="text" name="d[0]" id="mail" value="<?php echo $u['email']; ?>" class="" /></li>
		</div>


		<div class="center" style="display:none;">
			<input type="submit" class="send submitButton" name="submit" value="" />
		</div>
	</form>
	<a onclick="submit()" class="submitButton" name="submit">
		<div alt="formbutton_off_57" /></div>
	</a>
	
<!--
	<a onclick="submit()" class="submitButton" name="submit">
		<div alt="formbutton_off_57" width="" height="" /></div>
	</a>
-->

</div><!-- addForm -->

<script type="text/javascript">

function submit(){

    var arr = $('.dlForm input.formdata');
    
		$.ajax({
		type: "POST",
		async: false,
		data: arr.serializeArray(),
		url: "http://sociallanp.lastlanp.jp/add/user.php",
		success: function(getData){
				//console.log(getData);
				$(".center .submitButton").click();
			},
		error: function(getData){
			//console.log(getData);
		}
	});			

}

  $(document).ready(function(){
	
		$(".ready").slideUp();
//	});

/*	
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
*/
//  $(".mail input").ready(function(){
	if($(".mail input").val() == "")
		$(".mail input").val("<?php echo $mail; ?>");
	//else console.log("already");
		
	});

</script>