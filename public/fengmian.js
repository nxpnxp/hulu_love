
function ajax(options){  
      
    options=options||{};  
    options.data=options.data||{};  
    options.type=options.type||'get';  
    options.timeout=options.timeout||0;  
      
      
    //整理data数据  
    options.data.t=Math.random();//给data创建一个t 键  
    var arr=[];  
    for(var key in options.data){  
        arr.push(key+'='+encodeURIComponent(options.data[key]));      
    }  
    var str=arr.join('&');  
      
    if(window.XMLHttpRequest){//1  
        var oAjax=new XMLHttpRequest();   
    }else{  
        var oAjax=new ActiveXObject('Microsoft.XMLHTTP');     
    }  
      
    if(options.type=='get'){  
        oAjax.open('get',options.url+'?'+str,true);//2  
      
        oAjax.send();//3  
    }else{//post  
        oAjax.open('post',options.url,true);  
              
        //设定ajax的头信息  
        oAjax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');  
          
        oAjax.send(str);  
          
    }  
      
    oAjax.onreadystatechange=function(){//4  
        if(oAjax.readyState==4){  
            if(oAjax.status>=200 && oAjax.status<300 || oAjax.status==304){  
                clearInterval(timer);  
                options.success && options.success(oAjax.responseText)  
            }else{  
                options.error && options.error(oAjax.status);  
            }  
        }  
    };  
    if(options.timeout){  
        var timer=setTimeout(function(){  
            alert('超时了');     
            oAjax.abort();  //终止加载    
        },options.timeout);  
    }  
      
} 

wx.getLocation({
    type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
    success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
		
		sendPosition(latitude,longitude);
    }
});


function sendPosition(x,y){
    var map = new BMap.Map("allmap");
	map.centerAndZoom("重庆",12);  //重庆看你需要改
	var pointA=new BMap.Point(x,y);  
	var html="<div id='fengmian_one'>";
	
   ajax({
      url:'http://love.hulongtv.com/app/index.php?i=2&c=entry&do=fengmian&m=hulu_love',
	  data:{//注意参数是否与控制层的参数名称一致
		latitude:x,
		longitude:y
	  },
	  dataType:'json',
	  type:'post',
	  success:function(data){
		data=eval('('+data+')');		
		
		for(var i=0;i<data.length;i++){
		   pointBsource=data[i];
		   
		   var pointB=new BMap.Point(pointBsource.lat,pointBsource.lon); 
		   
		   var distince=(map.getDistance(pointA,pointB)).toFixed(2);
		   
		   pointBsource.distince=distince;
		   if(pointBsource.sex=='1') html+=getBoy(pointBsource);
		   if(pointBsource.sex=='2') html+=getGirl(pointBsource);		
		}
		
		html+="</div>";
		document.body.innerHTML=html;
	  }
   
   });
}

function getBoy(d){
   return   "<a href=''>"+
					"<div id='fengmian_one_style'>"+
						"<div class='fengmian_one_img'>"+
							"<img src='"+d.avatar+"'/>"+
								"<div class='fengmian_one_a' style='background-color:#0098F0;'><img src='{MODULE_URL}public/images/boy.png'/></div>"+
									"<div class='fengmian_one_b'>"+d.distince+"</div>"+
					    "</div>"+
					"</div>"+
   
		   "</a>"
   

}

function getGirl(d){
   return   "<a href=''>"+
					"<div id='fengmian_one_style'>"+
						"<div class='fengmian_one_img'>"+
							"<img src='"+d.avatar+"'/>"+
								"<div class='fengmian_one_a' style='background-color:#0098F0;'><img src='{MODULE_URL}public/images/girl.png'/></div>"+
									"<div class='fengmian_one_b'>"+d.distince+"</div>"+
					    "</div>"+
					"</div>"+
   
		   "</a>"
   

}



