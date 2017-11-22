<?php

global $_W;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('share');


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>