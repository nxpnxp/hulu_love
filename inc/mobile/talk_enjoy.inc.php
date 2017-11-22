<?php

global $_W,$_GPC;
include 'function.php';

if(!empty($_GPC['talk_id'])&&(!empty($_GPC['talk_openid']))){
$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

include $this->template('talk_enjoy');
}else{

message('请选择一条动态进行打赏！',$this->createMobileUrl('talk'),'success');
}

?>