<?php

global $_W,$_GPC;

if(!empty($_GPC['openid'])){

	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
	if(!empty($user)){

		if($user['uniacid']==$_W['uniacid']){

if($_GPC['type']=='tel'){
	$res1=pdo_update('hulu_love_more',array('more_real_tel'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));

	$res2=pdo_update('hulu_love_user',array('ureal'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));
}elseif($_GPC['type']=='card'){

		$res1=pdo_update('hulu_love_more',array('more_real_card'=>'4'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));

	$res2=pdo_update('hulu_love_user',array('ureal'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));

}elseif($_GPC['type']=='self'){

		$res1=pdo_update('hulu_love_more',array('more_real_self'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));

	$res2=pdo_update('hulu_love_user',array('ureal'=>'2'),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));

}else{}

			if((!empty($res1))&&(!empty($res2))){
				message('恭喜，修改成功！',$this->createWebUrl('user_view',array('openid'=>$_GPC['openid'])),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('user_view',array('openid'=>$_GPC['openid'])),'error');
			}


		}else{

			message('你无权修改此会员信息！',$this->createWebUrl('user_view',array('openid'=>$_GPC['openid'])),'error');
		}
	}else{
		message('该会员信息不存在！',$this->createWebUrl('user_view',array('openid'=>$_GPC['openid'])),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('user_view',array('openid'=>$_GPC['openid'])),'error');
}


?>