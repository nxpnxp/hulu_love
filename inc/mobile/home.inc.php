<?php

global $_W;
include 'function.php';

$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid ASC",array(':uniacid'=>$_W['uniacid']));


include $this->template('home');

?>