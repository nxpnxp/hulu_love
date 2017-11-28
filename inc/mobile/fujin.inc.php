<?php

global $_W;

include 'function.php';

$user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid and openid=:openid', array(':uniacid' => $_W['uniacid'],':openid' => $_W['openid']));

$users = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_user').' where uniacid=:uniacid and uid<>:uid and upid=4',array(':uniacid' => $_W['uniacid'],':uid'=>$user['uid']));


include $this->template('fujin');
    