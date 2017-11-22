<?php

global $_W;

include 'function.php';
$fans=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($fans['upid']=='4'){

$visitor=pdo_fetchall("SELECT * FROM".tablename('hulu_love_viewer')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

		include $this->template('top');

	include $this->template('visitor');
echo"<div id='home_user'>";


foreach($visitor as $key=>$visitor){

	
			$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$visitor['viewer_openid']));			
			include $this->template('userlist');	



}

	echo"</div>";
	include $this->template('bottom');


}else{

					message('VIP会员才能查看访问过自己的人！',$this->createMobileUrl('vip'),'success');



}
?>