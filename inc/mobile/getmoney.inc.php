<?php

global $_W;

include 'function.php';
$money=pdo_fetchall("SELECT * FROM".tablename('hulu_love_money')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY money_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('getmoney');

	
?>