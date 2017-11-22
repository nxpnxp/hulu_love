<?php

global $_W,$_GPC;
include 'function.php';
if($_W['ispost']){
	if(checksubmit('submit')){

$oldadmin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

$bigadmin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_did=:admin_did",array(':uniacid'=>$_W['uniacid'],':admin_did'=>'2'));

if(empty($oldadmin)){

	if(empty($bigadmin)){
			$admindata=array(
			'uniacid'=>$_W['uniacid'],
			'admin_pid'=>$_GPC['admin_pid'],
		'admin_did'=>$_GPC['admin_did'],
			'openid'=>$_GPC['openid'],
			'admin_time'=>$_W['timestamp'],
			'admin_ip'=>$_W['clientip'],
			
			);

		$res=pdo_insert('hulu_love_admin',$admindata);
		if(!empty($res)){
			message('恭喜！添加成功！',$this->createWebUrl('admin'),'success');
		}else{
			message('抱歉！添加失败！请重试...',$this->createWebUrl('admin'),'error');
		}
	}else{
						message('抱歉！已经存在总管理员！取消之前的总管理员，即可再次添加总管理员！',$this->createWebUrl('admin'),'error');

	
	}
}else{
				message('抱歉！已经添加过此会员为管理员，请勿重复添加！',$this->createWebUrl('admin'),'error');


}

	
	}

}
else{

	$admin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid ORDER BY admin_did DESC",array(':uniacid'=>$_W['uniacid']));
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid ASC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/admin');
}
?>