
var xmlHttp;
function S_xmlhttprequest(){
	if(window.ActiveXObject){
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	}else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
}

function contact_use(url){
	S_xmlhttprequest();
	xmlHttp.open("GET",url,true);
	xmlHttp.onreadystatechange = usermore;
	xmlHttp.send(null);
}

function usermore(){
	var usermorelist = xmlHttp.responseText;
	document.getElementById('view_content_c').innerHTML = usermorelist;
	//alert('123');
}


