<?php

global $_W,$_GPC;

if(!empty($_GPC['chat_id'])){

	$chat=pdo_fetch("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND news_id=:news_id",array(':uniacid'=>$_W['uniacid'],':news_id'=>$_GPC['chat_id']));
	if(!empty($chat)){

		if($chat['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_news',array('news_pid'=>$_GPC['chat_pid']),array('uniacid'=>$_W['uniacid'],'news_id'=>$_GPC['chat_id']));
			if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('chat'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('chat'),'error');
			}


		}else{

			message('你无权修改此聊天信息！',$this->createWebUrl('chat'),'error');
		}
	}else{
		message('该聊天信息不存在！',$this->createWebUrl('chat'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('chat'),'error');
}


?>