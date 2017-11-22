<?php

global $_W,$_GPC;

include 'function.php';
if($_W['ispost']){
if(checksubmit('submit')){
	$activedata=array(
			'uniacid'=>$_W['uniacid'],
			'active_pid'=>$_GPC['active_pid'],
			'openid'=>$_W['openid'],
			'active_title'=>$_GPC['active_title'],
			'active_type'=>$_GPC['active_type'],
			'active_boy'=>$_GPC['active_boy'],
			'active_girl'=>$_GPC['active_girl'],
			'active_money'=>$_GPC['active_money'],
			'active_address'=>$_GPC['active_address'],
			'active_starttime'=>strtotime($_GPC['active_starttime']),
			'active_endtime'=>strtotime($_GPC['active_endtime']),
			'active_tel'=>$_GPC['active_tel'],
			'active_content'=>$_GPC['active_content'],
			'active_time'=>$_W['timestamp'],
			'active_ip'=>$_W['clientip'],
			'active_container'=>$_W['container'],
			'active_os'=>$_W['os'],
			);

		$res=pdo_insert('hulu_love_active',$activedata);
		if(!empty($res)){
			message('恭喜！添加成功！',$this->createWebUrl('active'),'success');
		}else{
			message('抱歉！添加失败！请重试...',$this->createWebUrl('active'),'error');
		}
	




}

}else{

$active=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid']));

$active1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'1'));

$active2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'2'));

$active3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'3'));

$active4=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'4'));

$active5=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'5'));

$active6=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':active_pid'=>'6'));

	include $this->template('web/active');
}
?>