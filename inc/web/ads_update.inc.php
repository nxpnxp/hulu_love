<?php

global $_W,$_GPC;

if(!empty($_GPC['ads_id'])){

	$ads=pdo_fetch("SELECT * FROM".tablename('hulu_love_ads')."WHERE uniacid=:uniacid AND ads_id=:ads_id",array(':uniacid'=>$_W['uniacid'],':ads_id'=>$_GPC['ads_id']));
	if(!empty($ads)){

		if($ads['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_ads',array('ads_pid'=>$_GPC['ads_pid']),array('uniacid'=>$_W['uniacid'],'ads_id'=>$_GPC['ads_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('ads'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('ads'),'error');
			}


		}else{

			message('你无权修改此广告信息！',$this->createWebUrl('ads'),'error');
		}
	}else{
		message('该广告信息不存在！',$this->createWebUrl('ads'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('ads'),'error');
}


?>