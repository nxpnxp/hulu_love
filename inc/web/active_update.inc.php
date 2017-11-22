<?php

global $_W,$_GPC;





if(!empty($_GPC['active_id'])){

	$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id']));

	if(!empty($active)){		if($active['uniacid']==$_W['uniacid']){



	$res=pdo_update('hulu_love_active',array('active_pid'=>$_GPC['active_pid']),array('uniacid'=>$_W['uniacid'],'active_id'=>$_GPC['active_id']));

				if(!empty($res)){
				message('恭喜，更新成功！',$this->createWebUrl('active'),'success');
			}else{
				message('抱歉，更新失败！',$this->createWebUrl('active'),'error');
			}



		}else{			message('你无权更新此活动信息！',$this->createWebUrl('active'),'error');		}
	}else{		message('该活动信息不存在！',$this->createWebUrl('active'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('active'),'error');}


?>