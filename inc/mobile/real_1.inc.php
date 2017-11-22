<?php

global $_W,$_GPC;
include 'function.php';

$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($_W['ispost']){

	
	if(checksubmit('submit')){

		if($more['more_real_tel_num']==$_GPC['more_real_tel_num']&&$more['more_real_tel_authcode']==$_GPC['more_real_tel_authcode']){
pdo_update('hulu_love_more',array('more_real_tel'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

		$res=pdo_update('hulu_love_user',array('ureal'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

			message('恭喜！手机认证成功！',$this->createMobileUrl('real_1'),'success');
	

		}else{

			message('抱歉！手机或验证码错误！',$this->createMobileUrl('real_1'),'error');
		
		}


		}
		




	


}else{
	
$length=6;
$authcode=str_pad(mt_rand(0,pow(10,$length)-1),$length,'0',STR_PAD_LEFT);
include $this->template('real_1');

}
?>