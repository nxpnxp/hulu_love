<?php

global $_W;

if($_W['container']=='wechat'){
if($_W['fans']['follow']=='1'){
	$now=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	if(!empty($now)){
		if (isset($_COOKIE["admin_user"])&&($_COOKIE["admin_user"]=='hulu_love')){

include 'm_function.php';
$talk=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('m/m_talk');

}else{	message('正在跳转至首页！',$this->createMobileUrl('m_home'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}
?>