<?php

global $_W;

include 'function.php';

$receive=pdo_fetchall("SELECT * FROM".tablename('hulu_love_receive')."WHERE uniacid=:uniacid ORDER BY receive_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/receive');
?>