<?php

global $_W,$_GPC;

include 'function.php';
$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active_jidi')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid']));

include $this->template('active_jidi_view');
?>