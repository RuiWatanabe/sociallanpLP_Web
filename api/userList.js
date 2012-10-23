

var timer;
var flag =false;
function printFace(){
//console.log("登録ユーザー一覧を読み込んでいます。");
	$.ajax({
		type: "POST",
		url: 'http://sociallanp.lastlanp.jp/api/printUser/userList.php',
		success: function(data){

			if($("#facePile li").size())		
				$("#facePile li").fadeOut(500,function(){
					userLister(data);
				});
			else userLister(data);
			

		}	
});

}

var ranstr = function(n, b) {
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

var lc = false;
function printImage(id,num){
	//console.log("printimage:"+id);
	//console.log($("#"+id));
	if(!$("#"+id).size() && !lc ){lc=true; printFace();}
	setTimeout(function(){ $("#"+id).fadeIn(500); }, num*150);
}


function userLister(data){
		$("#facePile").text("");
	for(var i in data){
		var id = ranstr(6);
		$("#facePile").append('<li id="'+id+'" style="display:none"><img src="https://graph.facebook.com/'+data[i]+'/picture"></li>');
		printImage(id,i);
	}
	
	lc = false;
	clearTimeout(timer);
	timer = setTimeout("printFace()", 1000*15);
}