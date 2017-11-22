<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		$giftdata=array(
			
			'gift_pid'=>$_GPC['gift_pid'],
			'gift_did'=>$_GPC['gift_did'],
			'gift_name'=>$_GPC['gift_name'],
			'gift_price'=>$_GPC['gift_price'],
			'gift_pic'=>$_GPC['gift_pic'],
			'gift_time'=>$_W['timestamp'],
			'gift_ip'=>$_W['clientip'],
			);
		$res=pdo_update('hulu_love_gift',$giftdata,array('uniacid'=>$_W['uniacid'],'gift_id'=>$_GPC['gift_id']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('gift'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('gift'),'error');
			}
	}

}else{


$gift=pdo_fetch("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid AND gift_id=:gift_id",array(':uniacid'=>$_W['uniacid'],':gift_id'=>$_GPC['gift_id']));



if(!empty($_GPC['gift_id'])){	
	if(!empty($gift)){
		if($gift['uniacid']==$_W['uniacid']){

include $this->template('web/page/gift_edit');


		}else{			message('你无权修改此礼物信息！',$this->createWebUrl('gift'),'error');		}
	}else{		message('该礼物信息不存在！',$this->createWebUrl('gift'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('gift'),'error');}


}
?>