<?php

global $_W;
include 'function.php';
$vip=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_type=:order_type ORDER BY order_id DESC",array(':uniacid'=>$_W['uniacid'],':order_type'=>'1'));

include $this->template('web/vip');
?>