<?php

global $_W,$_GPC;

if(!empty($_GPC['gift_id'])){

	$gift=pdo_fetch("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid AND gift_id=:gift_id",array(':uniacid'=>$_W['uniacid'],':gift_id'=>$_GPC['gift_id']));
	if(!empty($gift)){

		if($gift['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_gift',array('gift_pid'=>$_GPC['gift_pid']),array('uniacid'=>$_W['uniacid'],'gift_id'=>$_GPC['gift_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('gift'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('gift'),'error');
			}


		}else{

			message('你无权修改此礼物信息！',$this->createWebUrl('gift'),'error');
		}
	}else{
		message('该礼物信息不存在！',$this->createWebUrl('gift'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('gift'),'error');
}


?>