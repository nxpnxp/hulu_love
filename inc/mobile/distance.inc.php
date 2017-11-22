<?php
global $_W,$_GPC;
include 'function.php';

$newdata=array(
'lon'=>$_REQUEST['longitude'],
'lat'=>$_REQUEST['latitude'],
);
pdo_update('hulu_love_user',$newdata,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
?>