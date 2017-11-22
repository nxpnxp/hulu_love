<?php

global $_W,$_GPC;

if($_W['ispost']){

$like=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND openid=:openid AND like_openid=:like_openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid'],':like_openid'=>$_W['openid']));

if(empty($like)){
	$newlike=array(
		'uniacid'=>$_W['uniacid'],
		'openid'=>$_GPC['openid'],
		'like_openid'=>$_W['openid'],
		//'like_nickname'=>$_W['fans']['nickname'],
		//'like_avatar'=>$_W['fans']['tag']['avatar'],
		//'like_sex'=>$_W['fans']['tag']['sex'],
		'like_time'=>$_W['timestamp'],
		'like_ip'=>$_W['clientip'],
		'like_container'=>$_W['container'],
		'like_os'=>$_W['os'],
		);

pdo_insert('hulu_love_like',$newlike);
}
}else{

echo'123';
include $this->template('hulong');

}
?>