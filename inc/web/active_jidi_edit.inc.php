<?php

global $_W,$_GPC;


if($_W['ispost']){
	if(checksubmit('submit')){
		
		
	$newactive=array(
			
			'active_pid'=>$_GPC['active_pid'],
			'openid'=>$_W['openid'],
			'active_rec'=>$_GPC['active_rec'],
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
			'image'=>$_GPC['image']
			
			);
		$res=pdo_update('hulu_love_active_jidi',$newactive,array('uniacid'=>$_W['uniacid'],'active_id'=>$_GPC['active_id']));

			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('active'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('active'),'error');
			}
		
	}

}else{




	if(!empty($_GPC['active_id'])){
	
		$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active_jidi')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id']));
	
		if(!empty($active)){
			if($active['uniacid']==$_W['uniacid']){
				include $this->template('web/page/active_jidi_edit');
			}else{
				message('你无权修改此活动信息！',$this->createWebUrl('active'),'error');		
			}
		}else{
			message('该活动信息不存在！',$this->createWebUrl('active'),'error');	
		}
	}else{
		message('请勿提交非法网址！',$this->createWebUrl('active'),'error');
	}

}
?>