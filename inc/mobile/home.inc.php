<?php

global $_W;
include 'function.php';

$vipuser=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and upid=4 ORDER BY uid desc limit 12",array(':uniacid'=>$_W['uniacid']));
foreach($vipuser as $k=>$v){
	$vipuser[$k]['photo'] = pdo_fetch("select * from ".tablename('hulu_love_photos')." where uniacid={$_W['uniacid']} and openid = '{$v['openid']}' order by pic_time desc limit 1 ");
}
//print_r($user);exit;
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
$ads = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_ads') . 'WHERE uniacid=:uniacid AND ads_pid=:ads_pid ORDER BY ads_did ASC', array(':uniacid' => $_W['uniacid'], ':ads_pid' => '1'));
$moreads = pdo_fetch('SELECT * FROM' . tablename('hulu_love_moreads') . " where uniacid={$_W['uniacid']} and  moreads_id = 1");
$signup = pdo_fetch('SELECT * FROM' . tablename('hulu_love_active') . " where uniacid={$_W['uniacid']} and  active_type = 2 and active_pid=4 order by active_time desc limit 1");
include $this->template('home');

?>