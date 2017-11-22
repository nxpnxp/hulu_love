<?php

global $_W;
include 'function.php';
//所有订单
$order=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid ORDER BY order_id DESC",array(':uniacid'=>$_W['uniacid']));

//未支付订单
$orderone=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_pid=:order_pid ORDER BY order_id DESC",array(':uniacid'=>$_W['uniacid'],':order_pid'=>'1'));

//已支付订单
$ordertwo=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_pid=:order_pid ORDER BY order_id DESC",array(':uniacid'=>$_W['uniacid'],':order_pid'=>'2'));

include $this->template('web/order');
?>