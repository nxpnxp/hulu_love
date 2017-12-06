<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

	//判断是否可添加活动权限 
	$search = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid and openid=:openid', array(':uniacid' => $_W['uniacid'],':openid'=>$_W['openid']));
	if(!$search['isadd']){
		message('抱歉！您没有权限。',$this->createMobileUrl('home'),'error');die;
	}
	
if($_W['ispost']){

	if(checksubmit('submit')){
		$activedata=array(
			'uniacid'=>$_W['uniacid'],
			'active_pid'=>'3',
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
			message('恭喜！添加成功！请等待审核成功之后即可显示...',$this->createMobileUrl('active'),'success');
		}else{
			message('抱歉！添加失败！请重试...',$this->createMobileUrl('active_add'),'error');
		}
	
	}

}else{
include $this->template('active_add');

}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>