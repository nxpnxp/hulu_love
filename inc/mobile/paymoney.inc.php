<?php

global $_W;
include 'function.php';
$pay=pdo_fetchall("SELECT * FROM".tablename('hulu_love_pay')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY pay_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('paymoney');
?>