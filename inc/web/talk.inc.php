<?php

global $_W,$_GPC;

include 'function.php';

if($_W['ispost']){

	if(checksubmit('submit')){

			$talkdata=array(
			'uniacid'=>$_W['uniacid'],
			'talk_pid'=>$_GPC['talk_pid'],
			'talk_did'=>$_GPC['talk_did'],
			'openid'=>$_GPC['openid'],
			'talk_content'=>$_GPC['talk_content'],
			'talk_pic1'=>$_GPC['talk_pic1'],
			'talk_pic2'=>$_GPC['talk_pic2'],
			'talk_pic3'=>$_GPC['talk_pic3'],
			'talk_view'=>'0',
			'talk_time'=>$_W['timestamp'],
			'talk_ip'=>$_W['clientip'],
			'talk_container'=>$_W['container'],
			'talk_os'=>$_W['os'],
			
		);

			$res=pdo_insert('hulu_love_talk',$talkdata);
		if(!empty($res)){
			message('恭喜！发布成功！',$this->createWebUrl('talk'),'success');
		}else{
			message('抱歉！发布失败！请重试...',$this->createWebUrl('talk'),'error');
		}
	
	
	}

}else{
$talk=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid']));

$talk1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_pid=:talk_pid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid'],':talk_pid'=>'1'));

$talk2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_pid=:talk_pid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid'],':talk_pid'=>'2'));

$talk3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_pid=:talk_pid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid'],':talk_pid'=>'3'));


$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid ASC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/talk');
}
?>