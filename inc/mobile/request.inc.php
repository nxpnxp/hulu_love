<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){
	if(checksubmit('submit')){
		$requestdata=array(
		'request_age_small'=>$_GPC['request_age_small'],
			'request_age_big'=>$_GPC['request_age_big'],
			'request_height_small'=>$_GPC['request_height_small'],
			'request_height_big'=>$_GPC['request_height_big'],
			'request_weight_small'=>$_GPC['request_weight_small'],
			'request_weight_big'=>$_GPC['request_weight_big'],
			'request_salary'=>$_GPC['request_salary'],
			'request_education'=>$_GPC['request_education'],
			'request_area'=>$_GPC['request_area'],
			'request_time'=>$_W['timestamp'],
			'request_ip'=>$_W['clientip'],
			'request_container'=>$_W['container'],
			'request_os'=>$_W['os'],
		
			);
		$res=pdo_update('hulu_love_request',$requestdata,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
		if(!empty($res)){
			message('恭喜！修改成功！',$this->createMobileUrl('my'),'success');
		}else{
			message('抱歉！修改失败！',$this->createMobileUrl('request'),'error');
		}
	
	}

}else{
$request=pdo_fetch("SELECT * FROM".tablename('hulu_love_request')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));



include $this->template('request');
}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>