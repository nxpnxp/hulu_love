<?php

global $_W,$_GPC;


	

if(!empty($_GPC['real_openid'])){

	$real=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['real_openid']));
	if(!empty($real)){

		if($real['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_more',array('more_real_card'=>$_GPC['real_pid']),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['real_openid']));

		pdo_update('hulu_love_user',array('ureal'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['real_openid']));

			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('real'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('real'),'error');
			}


		}else{

			message('你无权修改此认证信息！',$this->createWebUrl('real'),'error');
		}
	}else{
		message('该认证信息不存在！',$this->createWebUrl('real'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('real'),'error');
}


?>