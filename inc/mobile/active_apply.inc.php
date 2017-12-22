<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束
	
if($_W['ispost']){
	
	if(checksubmit('submit')){
			
		$real2=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'desc'=>$_GPC['active_title'],
			'desc1'=>$_GPC['active_title1'],
			'desc2'=>$_GPC['active_title2'],
			'desc3'=>$_GPC['active_title3'],
			'img1'=>$_GPC['more_real_card_pic1'],
			'img2'=>$_GPC['more_real_card_pic2'],
			'img3'=>$_GPC['more_real_card_pic3'],
			'type'=>0,
			'time'=>$_W['timestamp']
			);

			$res=pdo_insert('hulu_love_napply',$real2);
		if(!empty($res)){
			message('恭喜！申请成功，请等待审核！',$this->createMobileUrl('active'),'success');
		}else{
			message('抱歉！申请失败！',$this->createMobileUrl('active'),'error');
		}
	
	}

}else{
	load()->func('tpl');	
	include $this->template('active_apply');
}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>