<?php

global $_W;

include 'function.php';
$gift=pdo_fetchall("SELECT * FROM".tablename('hulu_love_receive')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY receive_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


include $this->template('my_gift');
?>