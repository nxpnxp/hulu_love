<?php

global $_W,$_GPC;
include 'function.php';
$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($_GPC['liketype']=='likeme'){

	if($user['upid']=='4'){

		$likeme=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));



			include $this->template('top');
						include $this->template('likeme');
echo"<div id='home_user'>";

		foreach($likeme as $key=>$likeme){

			$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$likeme['like_openid']));			
			include $this->template('userlist');		
		}
		echo"</div>";
								include $this->template('bottom');



	}else{
				message('VIP会员才能查看暗恋自己的人！',$this->createMobileUrl('vip'),'success');


	}

}elseif($_GPC['liketype']=='ilike'){

	$ilike=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND like_openid=:like_openid",array(':uniacid'=>$_W['uniacid'],':like_openid'=>$_W['openid']));



			
			include $this->template('top');
						include $this->template('ilike');
echo"<div id='home_user'>";

		foreach($ilike as $key=>$ilike){

			$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$ilike['openid']));
			include $this->template('userlist');		
		}
		echo"</div>";
								include $this->template('bottom');

}


?>