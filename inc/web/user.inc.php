<?php

global $_W,$_GPC;

include 'function.php';
//���л�Ա
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid']));

//������
$userone=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'1'));

//����˻�Ա
$usertwo=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'2'));

//��ͨ��Ա
$userthree=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'3'));

//VIP��Ա
$userfour=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'4'));

/*
$total=pdo_fetchcolumn("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid']));

$pageindex=max(intval($_GPC['page']),1); 
$pagesize=3; 
$pager=pagination($total,$pageindex,$pagesize);
*/

load()->func('tpl');
include $this->template('web/user');
?>