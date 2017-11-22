<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		
		
		$newads=array(
		
			'ads_pid'=>$_GPC['ads_pid'],
			'ads_did'=>$_GPC['ads_did'],
			
			'ads_title'=>$_GPC['ads_title'],
		
			'ads_pic'=>$_GPC['ads_pic'],
				'ads_link'=>$_GPC['ads_link'],
			'ads_time'=>$_W['timestamp'],
			'ads_ip'=>$_W['clientip'],
			);
			
			
		$res=pdo_update('hulu_love_ads',$newads,array('uniacid'=>$_W['uniacid'],'ads_id'=>$_GPC['ads_id']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('ads'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('ads'),'error');
			}
		
	}

}else{




if(!empty($_GPC['ads_id'])){

	$ads=pdo_fetch("SELECT * FROM".tablename('hulu_love_ads')."WHERE uniacid=:uniacid AND ads_id=:ads_id",array(':uniacid'=>$_W['uniacid'],':ads_id'=>$_GPC['ads_id']));

	if(!empty($ads)){		if($ads['uniacid']==$_W['uniacid']){



include $this->template('web/page/ads_edit');



		}else{			message('你无权删除此广告信息！',$this->createWebUrl('ads'),'error');		}
	}else{		message('该广告信息不存在！',$this->createWebUrl('ads'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('ads'),'error');}

}
?>