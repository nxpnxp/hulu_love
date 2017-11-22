<?php

global $_W,$_GPC;

include 'function.php';


$store=pdo_fetchall("SELECT * FROM".tablename('hulu_love_store')."WHERE uniacid=:uniacid AND openid=:openid AND store_openid=:store_openid ORDER BY store_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid'],'store_openid'=>$_W['openid']));

include $this->template('store');
?>