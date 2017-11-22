<?php

global $_W,$_GPC;





if(!empty($_GPC['join_id'])){

	$join=pdo_fetch("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND join_id=:join_id",array(':uniacid'=>$_W['uniacid'],':join_id'=>$_GPC['join_id']));

	if(!empty($join)){		if($join['uniacid']==$_W['uniacid']){



	$res=pdo_update('hulu_love_join',array('join_pid'=>$_GPC['join_pid']),array('uniacid'=>$_W['uniacid'],'join_id'=>$_GPC['join_id']));

				if(!empty($res)){
				message('恭喜，更新成功！',$this->createWebUrl('join'),'success');
			}else{
				message('抱歉，更新失败！',$this->createWebUrl('join'),'error');
			}



		}else{			message('你无权更新此报名信息！',$this->createWebUrl('join'),'error');		}
	}else{		message('该报名信息不存在！',$this->createWebUrl('join'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('join'),'error');}


?>