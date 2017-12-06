<?php

global $_W;
include 'function.php';
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
if (true) {
    $active = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_active') . 'WHERE uniacid=:uniacid AND active_pid=4 or active_pid=5 or active_pid=6 ORDER BY active_id DESC', array(':uniacid' => $_W['uniacid']));
    $ads = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_ads') . 'WHERE uniacid=:uniacid AND ads_pid=:ads_pid ORDER BY ads_did ASC', array(':uniacid' => $_W['uniacid'], ':ads_pid' => '1'));
    
	//判断是否可添加活动权限 
    $search = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid and openid=:openid', array(':uniacid' => $_W['uniacid'],':openid'=>$_W['openid']));
	
    include $this->template('active');
} else {
    getwebres();
}