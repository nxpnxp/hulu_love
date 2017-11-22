<?php

global $_W,$_GPC;

if($_W['ispost']){
if(checksubmit('submit')){
		$newtalk=array(
		
			'talk_pid'=>$_GPC['talk_pid'],
			'talk_did'=>$_GPC['talk_did'],
			'openid'=>$_GPC['openid'],
			'talk_content'=>$_GPC['talk_content'],
			'talk_pic1'=>$_GPC['talk_pic1'],
			'talk_pic2'=>$_GPC['talk_pic2'],
			'talk_pic3'=>$_GPC['talk_pic3'],
			'talk_time'=>$_W['timestamp'],
			'talk_ip'=>$_W['clientip'],
			'talk_container'=>$_W['container'],
			'talk_os'=>$_W['os'],
			
		);

			$res=pdo_update('hulu_love_talk',$newtalk,array('uniacid'=>$_W['uniacid'],'talk_id'=>$_GPC['talk_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('talk'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('talk'),'error');
			}
}

}else{

if(!empty($_GPC['talk_id'])){

	$talk=pdo_fetch("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_id=:talk_id",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id']));
	if(!empty($talk)){

		if($talk['uniacid']==$_W['uniacid']){

$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid ASC",array(':uniacid'=>$_W['uniacid']));

			include $this->template('web/page/talk_edit');
		


		}else{

			message('你无权修改此动态信息！',$this->createWebUrl('talk'),'error');
		}
	}else{
		message('该动态信息不存在！',$this->createWebUrl('talk'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('talk'),'error');
}

}
?>