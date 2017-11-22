<?php


global $_W,$_GPC;

include 'function.php';

$like=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid ORDER BY like_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/like');
?>