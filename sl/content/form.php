<?php
require '../config.php';
require '../system/sdk/facebook.php';

$facebook = new Facebook(array(
    'appId' => APP_ID,
    'secret' => APP_SECRET
));

$facebook->setAccessToken($_REQUEST['token']); //ログインしているかどうかをチェック。している場合ユーザIDを返す。
//$_REQUEST[]

$u = $facebook->api("/me&locale=ja_JP");
//print_r($u);


$employ = $u['work']['0']['employer']['name'].$u['work']['0']['position']['name'];
if(!$employ) $employ = $u['education']['0']['school']['name'];

$name = $u['name'];
$mail = $u['email'];

$id = $u['id'];

/*
	$url = 'http://sociallanp.lastlanp.jp/add/user.php';
	$data = array(
	     'screen_id' => $u['id'],
	     'mail' => $mail,
	     'entranceID' => APP_ID,
	     'name' => $name,
	     'screen_name' => $_REQUEST['username'],
	     'gender' => $_REQUEST['gender'],
	     'location' => $_REQUEST['location']['name'],
	     'name' => $name,
	     'code' => md5($mail),
	     'employ' => $employ,
	     'entranceName' => $_SERVER["HTTP_HOST"],
	);
	$options = array('http' => array(
	     'method' => 'POST',
	     'content' => http_build_query($data),
	));
	$ret = file_get_contents($url, false, stream_context_create($options));
	print_r($ret);
	
*/
//print_r($_REQUEST['token']);
?>

<script type="text/javascript" src="lib/lp.js"></script>

<div class="addForm">

	<img src="image/form.jpg" class="formBackImg" alt="form" width="" height="" />
	 
	<form class="dlForm" method="post" action="http://lanp.biz/ad/do">
		<input type="hidden" name="mid" value="soci" />
		<input type="hidden" name="fid" value="rlA2pZ" />
		<input type="hidden" name="charcode" value="auto" />
		<input class="formdata" type="hidden" name="d[1]" id="name" value="<?php echo $name; ?>" />
		<input class="formdata" type="hidden" name="d[2]" id="type" value="web" />
		<!--<input type="hidden" name="d[0]" id="mail" value="<?php echo $mail; ?>" />-->
		<input class="formdata" type="hidden" name="d[3]" id="auth" value="<?php echo md5($u['username']); ?>" />
		<input class="formdata" type="hidden" name="d[4]" id="fbname" value="<?php echo $u['username']; ?>" />
	    <input class="formdata" type="hidden" name="d[6]" id="location" value="<?php echo $u['location']['name']; ?>" />
	    <input class="formdata" type="hidden" name="d[5]" id="gender" value="<?php echo $u['gender']; ?>" />
	    <input class="formdata" type="hidden" name="d[7]" id="fbmail" value="<?php echo $mail; ?>" />
	    <input class="formdata" type="hidden" name="d[8]" id="employ" value="<?php echo $employ; ?>" />
	    <input class="formdata" type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
		
		<div class="mail">
		    <input class="formdata" type="text" name="d[0]" id="mail" value="<?php echo $mail; ?>" class="" /></li>
		</div>


		<div class="center" style="display:none;">
			<input type="submit" class="send submitButton" name="submit" value="" />
		</div>
	</form>
	<a onclick="submit()" class="submitButton" name="submit">
		<div alt="formbutton_off_57" width="" height="" /></div>
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
				$(".center .submitButton").click();
			},
		error: function(getData){
			console.log(getData);
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