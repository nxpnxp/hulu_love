<?php

global $_W,$_GPC;
include 'function.php';


$gift=pdo_fetchall("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid AND gift_pid=:gift_pid ORDER BY gift_did ASC",array(':uniacid'=>$_W['uniacid'],':gift_pid'=>'1'));

$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

include $this->template('gift');

?>