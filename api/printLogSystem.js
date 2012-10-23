$(document).ready(function(){
	$("body").append('<div id="logNotification" style="position:absolute; position:fixed; top:0px; display:none;"></div>');
	getList();
});


function getList(){
		//console.log("getList");
		$.ajax({
		type: "POST",
		url: "http://sociallanp.lastlanp.jp/api/notificationLog/notiList.php",
		success: function(data){
			console.log(data);
			for(var i in data){
				set(data[i],i);
			}
			//console.log("get"+data.length);
			if(data.length>0)
				setTimeout(function(){getList()},data.length*10000);
			else
				setTimeout(function(){getList()},10*1000);
		},
		error: function(data){
			console.log("error");
			console.log(data.responseText);			
		}
	});
}

function set(data,time){
	setTimeout (function(){telop(data)},time*10000);
}

var oldTelop; //同じ内容にテロップは更新表示しない
function telop(data){
	if(oldTelop	!= data)
	$("#logNotification").slideUp(500,function(){
		$("#logNotification").text("");
		$("#logNotification").append(data);
		$("#logNotification").slideDown(500);
		oldTelop = data;
	});	
}
