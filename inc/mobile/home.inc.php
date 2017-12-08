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
$signup = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_active') . " where uniacid={$_W['uniacid']} and  active_rec=1 order by active_time desc");
foreach($signup as $k=>$v){
$signup[$k]['active_starttime'] = date('Y-m-d H:i:s',$v['active_starttime']);
$signup[$k]['active_endtime'] = date('Y-m-d H:i:s',$v['active_endtime']);	
}

//保存用户头像 生成海报用
function _request($url, $https=true, $method='get', $data=null){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url); //设置URL
	curl_setopt($ch,CURLOPT_HEADER,false); //不返回网页URL的头信息
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出返回一个字符串
	if($https){
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//服务器端的证书不验证
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//客户端证书不验证
	}
	if($method == 'post'){
		curl_setopt($ch, CURLOPT_POST, true); //设置为POST提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置提交数据$data
	}
	$str = curl_exec($ch);//执行访问
	curl_close($ch);//关闭curl释放资源
	return $str;
}
$avatar = pdo_fetch('select * from '.tablename('hulu_love_user').' where uniacid=:uniacid and openid=:openid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
if($avatar){
	$name = $_W['uniacid'].'_'.$avatar['uid'];
	_request('http://vp.vipin.net.cn/saveAvatar.php',false,'post',array('avatar'=>$avatar['avatar'],'name'=>$name));
}

include $this->template('home');

?>