                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php

global $_W;
include 'function.php';

$vipuser=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and upid=4 ORDER BY uid desc limit 12",array(':uniacid'=>$_W['uniacid']));
foreach($vipuser as $k=>$v){
	$vipuser[$k]['photo'] = pdo_fetch("select * from ".tablename('hulu_love_photos')." where uniacid={$_W['uniacid']} and openid = '{$v['openid']}' order by pic_time desc limit 1 ");
}
$newuser=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and upid=3 ORDER BY regtime desc limit 12",array(':uniacid'=>$_W['uniacid']));
foreach($newuser as $k=>$v){
	$newuser[$k]['photo'] = pdo_fetch("select * from ".tablename('hulu_love_photos')." where uniacid={$_W['uniacid']} and openid = '{$v['openid']}' order by pic_time desc limit 1 ");
}
$girl = pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and upid=3 and sex=2 ORDER BY RAND() limit 12",array(':uniacid'=>$_W['uniacid']));
foreach($girl as $k=>$v){
	$newuser[$k]['photo'] = pdo_fetch("select * from ".tablename('hulu_love_photos')." where uniacid={$_W['uniacid']} and openid = '{$v['openid']}' order by pic_time desc limit 1 ");
}
$boy = pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and upid=3 and sex=1 ORDER BY RAND() limit 12",array(':uniacid'=>$_W['uniacid']));
foreach($boy as $k=>$v){
	$newuser[$k]['photo'] = pdo_fetch("select * from ".tablename('hulu_love_photos')." where uniacid={$_W['uniacid']} and openid = '{$v['openid']}' order by pic_time desc limit 1 ");
}
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
$ads = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_ads') . 'WHERE uniacid=:uniacid AND ads_pid=:ads_pid ORDER BY ads_did ASC', array(':uniacid' => $_W['uniacid'], ':ads_pid' => '1'));
$moreads = pdo_fetch('SELECT * FROM' . tablename('hulu_love_moreads') . " where uniacid={$_W['uniacid']} and  moreads_id = 1");
$signup = pdo_fetch('SELECT * FROM' . tablename('hulu_love_active') . " where uniacid={$_W['uniacid']} and  active_type = 2 and active_pid=4 order by active_time desc limit 1");
$signup['active_starttime'] = date('Y-m-d H:i:s',$signup['active_starttime']);
$signup['active_endtime'] = date('Y-m-d H:i:s',$signup['active_endtime']);
include $this->template('home');

?>