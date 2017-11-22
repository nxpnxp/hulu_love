<?php

global $_W,$_GPC;

include 'function.php';

if(!empty($_GPC['active_id'])){

	$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id']));

$join1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id'],':join_pid'=>'1'));


$join2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id'],':join_pid'=>'2'));

$join3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id'],':join_pid'=>'3'));

}else{
$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid']));

$join1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':join_pid'=>'1'));


$join2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':join_pid'=>'2'));

$join3=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':join_pid'=>'3'));

}
include $this->template('web/join');
?>