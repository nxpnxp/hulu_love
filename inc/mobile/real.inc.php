<?php

global $_W;
include 'function.php';


$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($more['more_real_tel'] == '2'){
	$isbind = 1;
}else{
	$isbind = 0;
}

load()->func('tpl');

include $this->template('real');
?>