<?php

global $_W,$_GPC;

if(!empty($_GPC['store_openid'])){

	$newstore=array(
		'store_pid'=>'1',
		'openid'=>$_W['openid'],
		'store_openid'=>$_GPC['store_openid'],
		'gift_id'=>$_GPC['gift_id'],
				//'store_time'=>$_W['timestamp'],
					//	'store_ip'=>$_W['clientip'],
				//'store_container'=>$_W['container'],
				//'store_os'=>$_W['os'],		
				);

$res=pdo_update('hulu_love_store',$newstore,array('uniacid'=>$_W['uniacid'],'store_id'=>$_GPC['store_id'],'openid'=>$_W['openid']));

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['store_openid']));
$uid=$user['uid'];
if(!empty($res)){
	message('赠送成功！',$this->createMobileUrl('view',array('uid'=>$uid)),'success');

}else{

		message('赠送失败！',$this->createMobileUrl('store',array('store_openid'=>$_GPC['store_openid'])),'error');


}

}else{

			message('请选择一个小伙伴才能赠送！',$this->createMobileUrl('store'),'error');


}
?>