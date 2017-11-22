<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){

	if(checksubmit('submit')){

		$real2=array(
			'uniacid'=>$_W['uniacid'],
			'more_real_card'=>'2',
			'more_real_card_name'=>$_GPC['more_real_card_name'],
			'more_real_card_num'=>$_GPC['more_real_card_num'],
			'more_real_card_pic1'=>$_GPC['more_real_card_pic1'],
			'more_real_card_pic2'=>$_GPC['more_real_card_pic2'],
			'more_real_card_pic3'=>$_GPC['more_real_card_pic3'],
			'more_time'=>$_W['timestamp'],
			'more_ip'=>$_W['clientip'],
			'more_container'=>$_W['container'],
			'more_os'=>$_W['os'],
			);

			$res=pdo_update('hulu_love_more',$real2,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
		if(!empty($res)){
			message('恭喜！修改成功！',$this->createMobileUrl('real_2'),'success');
		}else{
			message('抱歉！修改失败！',$this->createMobileUrl('real_2'),'error');
		}
	
	}



}else{
load()->func('tpl');

$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('real_2');
}
?>