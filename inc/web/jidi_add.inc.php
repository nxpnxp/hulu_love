<?php

global $_W,$_GPC;

include 'function.php';

if($_W['ispost']){
if(checksubmit('submit')){
	$activedata=array(
			'uniacid'=>$_W['uniacid'],
			'active_title'=>$_GPC['active_title'],
			'active_address'=>$_GPC['active_address'],
			'active_tel'=>$_GPC['active_tel'],
			'active_content'=>$_GPC['active_content'],
			'active_time'=>$_W['timestamp'],
			'active_ip'=>$_W['clientip'],
			'active_container'=>$_W['container'],
			'active_os'=>$_W['os'],
			'image'=>$_GPC['image']
			);

		$res=pdo_insert('hulu_love_active_jidi',$activedata);
		if(!empty($res)){
			message('恭喜！添加成功！',$this->createWebUrl('active'),'success');
		}else{
			message('抱歉！添加失败！请重试...',$this->createWebUrl('active'),'error');
		}
	




}

}else{
	include $this->template('web/jidi_add');
}
?>