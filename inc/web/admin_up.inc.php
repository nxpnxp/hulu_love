<?php

global $_W,$_GPC;

if(!empty($_GPC['admin_id'])){

	$admin=pdo_fetch("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_id=:admin_id",array(':uniacid'=>$_W['uniacid'],':admin_id'=>$_GPC['admin_id']));
	if(!empty($admin)){

		if($admin['uniacid']==$_W['uniacid']){



	$oldadmin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

	foreach($oldadmin as $key=>$oldadmin){
	$res1=pdo_update('hulu_love_admin',array('admin_did'=>'1'),array('uniacid'=>$_W['uniacid'],'admin_id'=>$oldadmin['admin_id']));

	}

	$res2=pdo_update('hulu_love_admin',array('admin_did'=>'2'),array('uniacid'=>$_W['uniacid'],'admin_id'=>$_GPC['admin_id']));


			if((!empty($res1))&&(!empty($res2))){
				message('恭喜，设置总管理员成功！',$this->createWebUrl('admin'),'success');
			}else{
				message('抱歉，设置总管理员失败！',$this->createWebUrl('admin'),'error');
			}


		}else{

			message('你无权设置此管理员为总管理员！',$this->createWebUrl('admin'),'error');
		}
	}else{
		message('该管理员信息不存在！',$this->createWebUrl('admin'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('admin'),'error');
}


?>