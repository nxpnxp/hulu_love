<?php

global $_W,$_GPC;

if($_W['ispost']){

if(checksubmit('submit')){






	$moreadsdata=array(
		
		'moreads_pic'=>$_GPC['moreads_pic'],
		'moreads_title'=>$_GPC['moreads_title'],
		'moreads_link'=>$_GPC['moreads_link'],
		'moreads_time'=>$_W['timestamp'],
		'moreads_ip'=>$_W['clientip'],
		);
	$res=pdo_update('hulu_love_moreads',$moreadsdata,array('uniacid'=>$_W['uniacid'],'moreads_page'=>$_GPC['moreads_page']));


		if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('ads'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('ads'),'error');
			}















}

}
?>