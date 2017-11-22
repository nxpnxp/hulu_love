<?php

global $_W,$_GPC;
include 'function.php';

$moreads2=pdo_fetch("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'2'));
echo $_W['openid'];


include $this->template('message');
?>