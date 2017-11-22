<?php

global $_W;
include 'function.php';
$systemget=pdo_fetchall("SELECT * FROM".tablename('hulu_love_system')."WHERE uniacid=:uniacid AND system_pid=:system_pid ORDER BY system_id DESC",array(':uniacid'=>$_W['uniacid'],':system_pid'=>'1'));

$systempay=pdo_fetchall("SELECT * FROM".tablename('hulu_love_system')."WHERE uniacid=:uniacid AND system_pid=:system_pid ORDER BY system_id DESC",array(':uniacid'=>$_W['uniacid'],':system_pid'=>'2'));

foreach($systemget as $key=>$getsystem){
	$nowsystemget+=$getsystem['system_price'];

}

foreach($systempay as $key=>$paysystem){
	$nowsystempay+=$paysystem['system_price'];

}

include $this->template('web/system');
?>