<?php

global $_W;


include 'function.php';
$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid']));

$photos1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND pic_pid=:pic_pid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':pic_pid'=>'1'));

$photos2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND pic_pid=:pic_pid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':pic_pid'=>'2'));

$photos3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND pic_pid=:pic_pid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':pic_pid'=>'3'));


include $this->template('web/photos');
?>