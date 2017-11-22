<?php

global $_W,$_GPC;

if(!empty($_GPC['admin_id'])){

	$admin=pdo_fetch("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_id=:admin_id",array(':uniacid'=>$_W['uniacid'],':admin_id'=>$_GPC['admin_id']));
	if(!empty($admin)){

		if($admin['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_admin',array('admin_pid'=>$_GPC['admin_pid']),array('uniacid'=>$_W['uniacid'],'admin_id'=>$_GPC['admin_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('admin'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('admin'),'error');
			}


		}else{

			message('你无权修改此管理员信息！',$this->createWebUrl('admin'),'error');
		}
	}else{
		message('该管理员信息不存在！',$this->createWebUrl('admin'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('admin'),'error');
}


?>