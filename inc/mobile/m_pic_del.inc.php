<?php

global $_W,$_GPC;

if($_W['container']=='wechat'){
if($_W['fans']['follow']=='1'){
	$now=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	if(!empty($now)){
		if (isset($_COOKIE["admin_user"])&&($_COOKIE["admin_user"]=='hulu_love')){

if(!empty($_GPC['pic_id'])){

	$pic=pdo_fetch("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND pic_id=:pic_id",array(':uniacid'=>$_W['uniacid'],':pic_id'=>$_GPC['pic_id']));
	if(!empty($pic)){

		if($pic['uniacid']==$_W['uniacid']){

			$res=pdo_delete('hulu_love_photos',array('uniacid'=>$_W['uniacid'],'pic_id'=>$_GPC['pic_id']));
			if(!empty($res)){
				load()->func('file');
file_delete($pic['pic_url']);
				message('恭喜，删除成功！',$this->createMobileUrl('m_pic'),'success');
			}else{
				message('抱歉，删除失败！',$this->createMobileUrl('m_pic'),'error');
			}




		}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}


}else{	message('正在跳转至首页！',$this->createMobileUrl('m_home'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}
?>