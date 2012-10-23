
/*
 * jQuery hashchange event - v1.3 - 7/21/2010
 * http://benalman.com/projects/jquery-hashchange-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function($,e,b){var c="hashchange",h=document,f,g=$.event.special,i=h.documentMode,d="on"+c in e&&(i===b||i>7);function a(j){j=j||location.href;return"#"+j.replace(/^[^#]*#?(.*)$/,"$1")}$.fn[c]=function(j){return j?this.bind(c,j):this.trigger(c)};$.fn[c].delay=50;g[c]=$.extend(g[c],{setup:function(){if(d){return false}$(f.start)},teardown:function(){if(d){return false}$(f.stop)}});f=(function(){var j={},p,m=a(),k=function(q){return q},l=k,o=k;j.start=function(){p||n()};j.stop=function(){p&&clearTimeout(p);p=b};function n(){var r=a(),q=o(m);if(r!==m){l(m=r,q);$(e).trigger(c)}else{if(q!==m){location.href=location.href.replace(/#.*/,"")+q}}p=setTimeout(n,$.fn[c].delay)}$.browser.msie&&!d&&(function(){var q,r;j.start=function(){if(!q){r=$.fn[c].src;r=r&&r+a();q=$('<iframe tabindex="-1" title="empty"/>').hide().one("load",function(){r||l(a());n()}).attr("src",r||"javascript:0").insertAfter("body")[0].contentWindow;h.onpropertychange=function(){try{if(event.propertyName==="title"){q.document.title=h.title}}catch(s){}}}};j.stop=k;o=function(){return a(q.location.href)};l=function(v,s){var u=q.document,t=$.fn[c].domain;if(v!==s){u.title=h.title;u.open();t&&u.write('<script>document.domain="'+t+'"<\/script>');u.close();q.location.hash=v}}})();return j})()})(jQuery,this);



var dir = "system";
$(document).ready(function(){

	//$("#sendMessage").bind("click",sendMessage());
$("form").bind("submit", function() {
 sendMessage();
 	return false;

})
	//$(".connectFacebook").after('<div class="loadIcon" style="display:none;"></div><div class="addContent"></div>');
	valPrint();    
	$(window).hashchange(); // Windowロード時に実行できる
	//checkLoginState();
	



$("form").validate({
		rules: {
			name :{
				required: true
			},
			mail :{
				required: true,
				email: true
			},
			body :{
				required: true,
				minlength: 10
			}
		},
		messages: {
			name :{
				required: "お名前を入力してください"
			},
			mail :{
				required: "メールアドレスを入力してください",
				email: "正しいメールアドレスを入力してください"
			},
			body :{
				required: "メッセージを入力してください",
				minlength: "メッセージ内容が短すぎます"
			}
		}
	});

});


//ハッシュが変更されたときの処理
$(window).hashchange(function() {
    hashCheck(location.hash.replace('#!/', ''));
}); // ハッシュフラグメントが変わったときにHoge()を実行する



function valPrint(){

	if(userInfo['email'] != undefined)
		$(".val-email").text(" ("+userInfo['email']+") ");
}


var nowHash = "";

//ハッシュのチェックと、ある場合の処理を行う
function hashCheck(hash){
	//console.log(hash);
	hash = hash.replace("#","");
	//hash = hash.replace("_=_","");

	//パラメータ型(xx=xx)だった場合	
	if(hash.indexOf("=") > -1){
		hash = hash.split("=");
		
		//mパラメータに対応する要素は、表示する
		if(hash[0]=="m")
			$(".hash-"+hash[1]).slideDown();

	}
	//ページ型だった場合
	else{
		//console.log(hash);
		if(hash==""||hash==undefined)hash="home";
		changePage(hash);
	}
	nowHash = hash;
}




function changePage(hash){
console.log(hash);
	$.ajax({
		type: "POST",
		url: "pages/"+hash+".php",
		//async: false,
		success: function(getData){

			if(hash == "home")	printFace();
			//console.log(getData);
			 	$("ul.nav li").removeClass("active");
			 	$("ul.nav li#"+hash).addClass("active");
			 
			 if($(".container .unit").size())
				 $(".container .unit").fadeOut(300,function(){
				 	$(".container .unit").remove();
				$(".container>.navbar.navbar-inverse.navbar-fixed-top").after(getData);
				//$(".container .unit").slideDown(300);
				 });
				else{
				$(".container>.navbar.navbar-inverse.navbar-fixed-top").after(getData);
				//$(".container .unit").slideDown(300);

				}
			}
	});	

}


var userInfo = new Array();

//ログイン状態を取得する
function checkLoginState(){
	
	$.ajax({
		type: "POST",
		url: dir+"/getState.php",
		//async: false,
		success: function(getData){
			console.log(getData);
			var loginUri = getData['loginUri'];
			var logoutUri = getData['logoutUri'];
			var loginState = getData['loginState'];
			userInfo = getData['userInfo'];
			//console.log("ログイン状態:"+loginState);
			//console.log(getData);
			//console.log("すでにシェアしている記事:"+getData['sharePost']);
			
				$(".val-email").text(" ("+userInfo['email']+") ");
				$(".fbConnect a").attr({href:loginUri});
				//$.get(".modal-body").load(loginUri);
				


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
			//console.log(getData);
			}
	});	
	
}

function callback(){
	//console.log(name);
	if(name != "error"){
		//open(name);
		checkLoginState();
	}
	
	$.ajax({
		type: "POST",
		url: dir+"/addData.php",
		//async: false,
		success: function(getData){
			//console.log(getData);
		}
	});	

	document.location = "http://hirayamaru.info/sociallanpLP_WP/#!/m=complete";
}



//記事を開く
function open(name){
	//$("div.loadIcon").slideDown();
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
						$("div.loadIcon,.ready").slideUp();
					}
					else{ //何も取得できなかった場合
					//console.log("ERROR:"+data);
						$(".addContent").text("続きの読み込みに失敗しました。");
						//$(".connectFacebook").fadeOut();
						//$(".addContent").slideDown();
						$("div.loadIcon").slideUp();					
					}
					
				},
				error: function(data){
						//console.log("ERROR:"+data);
						$(".addContent").text("続きの読み込みに失敗しました。");
						$(".connectFacebook").fadeOut();
						$(".addContent").fadeIn();
						$("div.loadIcon").slideUp();					
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
					//console.log(data);
				}
			});			
		}else{
			//console.log("FaceBookでのポストは行いませんでした。");
		}
}

function logout(){
	$.ajax({
		type: "POST",
		url: dir+"/logout.php",
		success: function(data){
			//console.log("logout:"+data);
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
				//console.log("checkShare-shareInfo:"+i);
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
	var mail = $(".dlForm .mail input").val();
	var name = $(".dlForm .name input").val();

	var username = userInfo.username;

	try{ var location = userInfo.location.name; }
	catch(e){ var location = "未記入"; }

	var realname = userInfo.name;
	
	var gender = userInfo.gender;
	if(gender=="male")
		gender = "男性";
	else gender = "女性";	
	
	var code = "none";

		$.ajax({
		type: "POST",
		async: false,
		data: "name="+name+"&mail="+mail,
		url: dir+"/getCode.php",
		success: function(_code){
				code = _code;
				}
		});			

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
	else
		console.log("code:"+_code);

}



//ソーシャルランプのDBにユーザー情報を格納
function addUser(data){
	
	$.ajax({
		type: "POST",
		async: false,
		data: data,
		url: dir+"/addUser.php",
		success: function(_data){
			console.log(_data);
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



function sendMessage(){

if($("form").valid()){

	var data =({
		'name': $("#contactForm #inputName").val(),
		'mail':$("#contactForm #inputMail").val(),
		'body':$("#contactForm #inputBody").val(),
	});
	
	
	$.ajax({
		type: "POST",
		data: data,
		url: "http://sociallanp.lastlanp.jp/api/lib/sendMail.php",
		success: function(_data){
			if(_data){
				$("#contactForm .close").click();
				printAlert("メッセージの送信が完了しました。");
			}

		}
	});	

}
}



function printAlert(message){
	
var id = randobet(6);
var _data = 
'<div id="'+id+'" style="display:none" class="alert alert-block alert-success">'+
'<button type="button" class="close" data-dismiss="alert">×</button>'+
message+'</div>';


	//$(".hero-unit").before(data);
	$(".hero-unit").before(_data);
	$("#"+id).slideDown(300);
	setTimeout(function(){ $("#"+id).slideUp(600); },6500);

}


var randobet = function(n, b) {
	b = b || '';
	var a = 'abcdefghijklmnopqrstuvwxyz'
		+ 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
		+ '0123456789'
		+ b;
	a = a.split('');
	var s = '';
	for (var i = 0; i < n; i++) {
    	s += a[Math.floor(Math.random() * a.length)];
	}
	return s;
};


