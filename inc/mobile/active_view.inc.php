<?php

global $_W,$_GPC;

include 'function.php';
$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid']));

$my_join=pdo_fetch("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid'],':openid'=>$_W['openid']));

$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid'],':join_pid'=>'3'));

$join_boy=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_sex=:join_sex",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid'],':join_sex'=>'1'));

$join_boy_num=count($join_boy);
$join_girl=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_sex=:join_sex",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid'],':join_sex'=>'2'));
$join_girl_num=count($join_girl);

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
$order_price=(($active['active_money'])*($make['make_active_pay']));

$signup = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_active') . " where uniacid={$_W['uniacid']} and  active_id={$_GPC['vid']}");
foreach($signup as $k=>$v){
$signup[$k]['active_starttime'] = date('Y-m-d H:i:s',$v['active_starttime']);
$signup[$k]['active_endtime'] = date('Y-m-d H:i:s',$v['active_endtime']);	
}

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('active_view');
?>