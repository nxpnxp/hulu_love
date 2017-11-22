<?php

global $_W,$_GPC;

if($_W['container']=='wechat'){
if($_W['fans']['follow']=='1'){
	$now=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	if(!empty($now)){
		if (isset($_COOKIE["admin_user"])&&($_COOKIE["admin_user"]=='hulu_love')){


if(!empty($_GPC['talk_id'])){

	$talk=pdo_fetch("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_id=:talk_id",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id']));
	if(!empty($talk)){

		if($talk['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_talk',array('talk_pid'=>$_GPC['talk_pid']),array('uniacid'=>$_W['uniacid'],'talk_id'=>$_GPC['talk_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createMobileUrl('m_talk'),'success');
			}else{
				message('抱歉，修改失败！',$this->createMobileUrl('m_talk'),'error');
			}




		}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}


}else{	message('正在跳转至首页！',$this->createMobileUrl('m_home'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}

?>