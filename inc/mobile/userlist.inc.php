<?php

global $_W,$_GPC;
include 'function.php';
//����
if($_GPC['vid']=='1'){

	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid']));
	include $this->template('userlist');

//��Ů��
}elseif($_GPC['vid']=='2'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 AND sex=:sex ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':sex'=>'2'));
	include $this->template('userlist');

//������
}elseif($_GPC['vid']=='3'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND sex=:sex AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':sex'=>'1'));
	include $this->template('userlist');

//ʵ����֤
}elseif($_GPC['vid']=='4'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND ureal=:ureal AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':ureal'=>'2'));
	include $this->template('userlist');

//VIP
}elseif($_GPC['vid']=='5'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid AND vip_endtime>=".$_W['timestamp']." ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'4'));
	include $this->template('userlist');

//���а�
}elseif($_GPC['vid']=='6'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 ORDER BY view DESC",array(':uniacid'=>$_W['uniacid']));
	include $this->template('userlist');

}else{}
?>