<?php

global $_W,$_GPC;

include 'function.php';
if($_W['ispost']){

	if(checksubmit('submit')){
		$newwithdraw=array(
			'with_pid'=>$_GPC['with_pid'],
			'with_content'=>$_GPC['with_content'],
			);

			$res=pdo_update('hulu_love_withdraw',$newwithdraw,array('uniacid'=>$_W['uniacid'],'with_id'=>$_GPC['with_id']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('withdraw'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('withdraw'),'error');
			}
	
	}


}else{
$withdraw=pdo_fetch("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid AND with_id=:with_id",array(':uniacid'=>$_W['uniacid'],':with_id'=>$_GPC['with_id']));

$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$withdraw['openid']));

include $this->template('web/page/withdraw_edit');

}
?>