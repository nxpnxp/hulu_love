<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){

	if(checksubmit('submit')){

		$withdraw=array(

			'more_withdraw_wechat'=>$_GPC['more_withdraw_wechat'],
			'more_withdraw_wechat_qrcode'=>$_GPC['more_withdraw_wechat_qrcode'],

			'more_withdraw_alipay'=>$_GPC['more_withdraw_alipay'],
			'more_withdraw_alipay_qrcode'=>$_GPC['more_withdraw_alipay_qrcode'],




'more_time'=>$_W['timestamp'],
				'more_ip'=>$_W['clientip'],
'more_container'=>$_W['container'],
'more_os'=>$_W['os'],

			
		);
		$res=pdo_update('hulu_love_more',$withdraw,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
			if(!empty($res)){
			message('恭喜！修改成功！',$this->createMobileUrl('withdraw'),'success');
		}else{
			message('抱歉！修改失败！',$this->createMobileUrl('withdraw_edit'),'error');
		}


	}

}else{

	$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


include $this->template('withdraw_edit');
}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束

?>