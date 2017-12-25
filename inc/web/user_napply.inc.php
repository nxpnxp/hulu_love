<?php

global $_W,$_GPC;

include 'function.php';
//所有会员

$sql  = "SELECT a.*,u.nickname,u.avatar FROM".tablename('hulu_love_napply')." a ";
$sql .= " left join".tablename('hulu_love_user')." u on a.openid = u.openid ";
$sql .= " WHERE a.uniacid=:uniacid ORDER BY time DESC";
$user=pdo_fetchall($sql,array(':uniacid'=>$_W['uniacid']));

$id = $_GPC['id'];
$type = $_GPC['type'];
if($id && $type){
	$res = pdo_update('hulu_love_napply',array(
		'type' => $type
	),array(
		'id' => $id
	));
	if($res){
		message('恭喜，更新成功！',$this->createWebUrl('napply'),'success');
	}else{
		message('抱歉，操作有误！',$this->createWebUrl('napply'),'error');
	}
}else{
	message('抱歉，操作有误！',$this->createWebUrl('napply'),'error');
}


?>