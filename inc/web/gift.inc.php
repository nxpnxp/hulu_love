<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		$giftdata=array(
			'uniacid'=>$_W['uniacid'],
			'gift_pid'=>$_GPC['gift_pid'],
			'gift_did'=>$_GPC['gift_did'],
			'gift_name'=>$_GPC['gift_name'],
		'gift_price'=>$_GPC['gift_price'],
			'gift_pic'=>$_GPC['gift_pic'],
			'gift_time'=>$_W['timestamp'],
			'gift_ip'=>$_W['clientip'],
			);
		$res=pdo_insert('hulu_love_gift',$giftdata);

				if(!empty($res)){
				message('恭喜，添加成功！',$this->createWebUrl('gift'),'success');
			}else{
				message('抱歉，添加失败！',$this->createWebUrl('gift'),'error');
			}
	}

}else{


$gift=pdo_fetchall("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid ORDER BY gift_did ASC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/gift');
}
?>