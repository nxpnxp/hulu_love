<?php

global $_W,$_GPC;

include 'function.php';
if($_W['ispost']){

	if(checksubmit('submit')){

$res=pdo_update('hulu_love_user',array('nickname'=>$_GPC['nickname']),array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

if(!empty($res)){
	message('昵称修改成功！',$this->createMobileUrl('avatar'),'success');

}else{
		message('昵称修改失败，请重试！',$this->createMobileUrl('avatar'),'error');


}


	}


}else{

	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

		$fans=pdo_fetch("SELECT * FROM".tablename('mc_mapping_fans')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

		$member=pdo_fetch("SELECT * FROM".tablename('mc_members')."WHERE uniacid=:uniacid AND uid=:uid",array(':uniacid'=>$_W['uniacid'],':uid'=>$fans['uid']));


load()->func('tpl');
include $this->template('avatar');

}
?>