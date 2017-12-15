<?php

global $_W,$_GPC;
include 'function.php';

$id = $_GPC['id'];
$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid",array(':uniacid'=>$_W['uniacid'],':active_id'=>$id,':join_pid'=>'3'));

include $this->template('active_xhb');
?>