<?php

global $_W,$_GPC;

if(!empty($_GPC['talk_id'])){

	$talk=pdo_fetch("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_id=:talk_id",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id']));
	if(!empty($talk)){

		if($talk['uniacid']==$_W['uniacid']){

			$res=pdo_delete('hulu_love_talk',array('uniacid'=>$_W['uniacid'],'talk_id'=>$_GPC['talk_id']));
			if(!empty($res)){
				message('恭喜，删除成功！',$this->createWebUrl('talk'),'success');
			}else{
				message('抱歉，删除失败！',$this->createWebUrl('talk'),'error');
			}


		}else{

			message('你无权删除此动态信息！',$this->createWebUrl('talk'),'error');
		}
	}else{
		message('该动态信息不存在！',$this->createWebUrl('talk'),'error');
	
	}

}else{
	message('请勿提交非法网址！',$this->createWebUrl('talk'),'error');
}


?>