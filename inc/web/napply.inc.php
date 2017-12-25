<?php

global $_W,$_GPC;

include 'function.php';
//所有会员

$sql  = "SELECT a.*,u.nickname,u.avatar FROM".tablename('hulu_love_napply')." a ";
$sql .= " left join".tablename('hulu_love_user')." u on a.openid = u.openid ";
$sql .= " WHERE a.uniacid=:uniacid and a.type=0 ORDER BY time DESC";
$user=pdo_fetchall($sql,array(':uniacid'=>$_W['uniacid']));

load()->func('tpl');
include $this->template('web/napply');
?>