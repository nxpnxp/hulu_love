<?php

global $_W;
include 'function.php';

//�ж�ͷ����ʼ
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//�ж�ͷ������

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('share');


//�ж�β����ʼ
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//�ж�β������
?>