

function smartRollover() {
	if(document.getElementsByTagName) {
		var images = document.getElementsByTagName("img");

		for(var i=0; i < images.length; i++) {
			if(images[i].getAttribute("src").match("_off."))
			{
				images[i].onmouseover = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));
				}
				images[i].onmouseout = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));
				}
			}
		}
	}
}

if(window.addEventListener) {
	window.addEventListener("load", smartRollover, false);
}
else if(window.attachEvent) {
	window.attachEvent("onload", smartRollover);
}



var dir = "lib";
/*
$(document).ready(function(){

	//$(".connectFacebook").after('<div class="loadIcon" style="display:none;"><img src="plugin/loadIcon.gif" /></div><div class="addContent"></div>');
	
		$(".connectFacebook").after(
		'<div class="addContent"></div>'
		);


	checkLoginState();
    
});
*/
var userInfo = new Array();

//ログイン状態を取得する
function checkLoginState(){
	
	$.ajax({
		type: "POST",
		url: dir+"/getState.php",
		//async: false,
		success: function(getData){
			//console.log(getData);
			var loginUri = getData['loginUri'];
			var logoutUri = getData['logoutUri'];
			var loginState = getData['loginState'];
			userInfo = getData['userInfo'];
			////console.log("ログイン状態:"+loginState);
			////console.log(getData);
			////console.log("すでにシェアしている記事:"+getData['sharePost']);
			
				$(".connectFacebook a").attr({href:loginUri});

/*	
				if(loginState == 0){
					logout();
				}
*/	
/*
				}else{
					$(".connectFacebook").fadeIn();
					$(".loadIcon").slideUp();					
				}
*/
					//$(".connectFacebook").fadeIn();
					$(".loadIcon").slideUp();					

			}
	});	
	
}



function debug(){
	//$("#debug").append("start debug mode");

	$.ajax({
		type: "POST",
		url: dir+"/getState.php",
		//async: false,
		success: function(getData){
			////console.log(getData);
			}
	});	
	
}

/*
function callback(name){
	//console.log(name);
	if(name != "error"){
		open(name);
		checkLoginState();
	}
}
*/
function callback(message){
	console.log(message);
	if(message.indexOf("true") != -1){
		$("div.loadIcon").slideDown();
		open(message);
	}
}




//記事を開く
function open(name){
	$("img.loading").slideDown();
	$(".connectFacebook").fadeOut();

			$.ajax({
				type: "POST",
				//async: false,
				//data:'name='+name,
				url: "form.php",
				success: function(data){
					if(data!=""){ //何かしらのコンテンツが取得できた場合
						$(".addContent").append(data);
						$(".addContent").slideDown();
	
						//share();
						//debug();
						$("img.loading,.ready").slideUp();
						//$("img.loading").slideUp();
					}
					else{ //何も取得できなかった場合
					////console.log("ERROR:"+data);
						$(".addContent").text("続きの読み込みに失敗しました。");
						//$(".connectFacebook").fadeOut();
						//$(".addContent").slideDown();
						$("img.loading").slideUp();					
					}
					
				},
				error: function(data){
						////console.log("ERROR:"+data);
						$(".addContent").text("続きの読み込みに失敗しました。");
						$(".connectFacebook").fadeOut();
						$(".addContent").fadeIn();
						$("img.loading").slideUp();					
				}
			});
		

}


function share(){
		if(checkShare()){//記事をシェアする必要があるかどうかを判断する
			$.ajax({
				type: "POST",
				url: dir+"/share.php",
				//data: "postSlug="+postSlug,
				//async: false,
				data: "openName="+name+"&body="+document.title+"&url="+document.URL,
				success: function(data){
					////console.log(data);
				}
			});			
		}else{
			////console.log("FaceBookでのポストは行いませんでした。");
		}
}

function logout(){
	$.ajax({
		type: "POST",
		url: dir+"/logout.php",
		success: function(data){
			////console.log("logout:"+data);
			//checkLoginState();
			//$(".addContent").slideUp();
			//$(".addContent").html("");
		}
	});
}



//記事をポストするかどうかを判断する
//シェアしておらず、シェアする必要がある場合はtrue、シェアする必要が無い場合はfalse
function checkShare(){
	var checkBool = false;
		$.ajax({
		type: "POST",
		async: false,
		url: dir+"/getState.php",
		success: function(getdata){
				var i = getdata['shareInfo'];
				////console.log("checkShare-shareInfo:"+i);
				if(i!='already') //『すでにシェアしている』ではない場合
					checkBool = true;
				else
				 	checkBool = false;
			},
		error: function(getData){
			checkBool = false;
		}
	});			
	return checkBool;
}




//送信ボタンを押した時の処理
function submit(){

/*
$.ajax({
type: "POST",
async: false,
url: "http://sociallanp.lastlanp.jp/lib/getUserInfo.php",
success: function(data){
	userInfo = data;
	console.log(data);
		}
});			
*/

	var mail = $(".dlForm .mail input").val();
	//var name = $(".dlForm .name input").val();
	var name = userInfo.name;
	console.log(name);
	var username = userInfo.username;

	try{ var location = userInfo.location.name; }
	catch(e){ var location = "未記入"; }

	var realname = userInfo.name;
	
	var gender = userInfo.gender;
/*
	if(gender=="male")
		gender = "男性";
	else gender = "女性";
*/


var sendData = new Object();
sendData['mail'] = mail;
sendData['name'] = name;
sendData['username'] = username;
sendData['location'] = location;
sendData['gender'] = gender;
sendData['realname'] = realname;
sendData['code'] = code;
	
	
	var code = "none";

	var sendData = new Object();
	sendData['mail'] = mail;
	sendData['name'] = name;
	sendData['username'] = username;
	sendData['location'] = location;
	sendData['gender'] = gender;
	sendData['realname'] = realname;
	sendData['code'] = code;
	

	if(code!= "none"){
		addUser(sendData);
		sendExpert(sendData);
		}
		//console.log("code:"+_code);

}



//ソーシャルランプのDBにユーザー情報を格納
function addUser(data){
	
	$.ajax({
		type: "POST",
		async: false,
		data: data,
		url: dir+"/addUser.php",
		success: function(_data){
			//console.log(_data);
		}
	});			

}

//エキスパートメールにデータを送る
function sendExpert(data){
	$("#auth").val(data['code']);
	$("#username").val(data['username']);
	$("#location").val(data['location']);
	$("#gender").val(data['gender']);
	$("#realname").val(data['realname']);
	$("#name").val(data['name']);
	$("#mail").val(data['mail']);
	$(".dlForm .send").click();
}



