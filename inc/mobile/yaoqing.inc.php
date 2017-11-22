<?php

global $_W,$_GPC;
if($_W['ispost']){
if(checksubmit('submit')){

$yaoqing=array(
	'yaoqing_tel'=>$_GPC['yaoqing_tel'],
		'yaoqing_name'=>$_GPC['yaoqing_name'],

	);

	$res=pdo_update('hulu_love_more',$yaoqing,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

if(!empty($res)){
	message('恭喜，修改成功！',$this->createMobileUrl('real'),'success');

	}else{
			message('抱歉，修改失败！',$this->createMobileUrl('real'),'error');


	}
}

	message('非法访问',$this->createMobileUrl('real'),'error');

}
?>