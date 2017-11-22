<?php

global $_W;

include 'function.php';
$real2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND more_real_card=:more_real_card ORDER BY more_id DESC",array(':uniacid'=>$_W['uniacid'],':more_real_card'=>'2'));

$real3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND more_real_card=:more_real_card ORDER BY more_id DESC",array(':uniacid'=>$_W['uniacid'],':more_real_card'=>'3'));

$real=array_merge($real2,$real3);


include $this->template('web/real');
?>