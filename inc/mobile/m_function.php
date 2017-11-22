<?php

function getnickname($openid,$uniacid){
	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));
	return $user['nickname'];
}


function getsex($sex){
	if($sex=='1'){$usersex='男';}
	if($sex=='2'){$usersex='女';}
	return $usersex;
}

function getavatar($openid,$uniacid,$attachurl){
	
$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));

$fans=pdo_fetch("SELECT * FROM".tablename('mc_mapping_fans')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));

$member=pdo_fetch("SELECT * FROM".tablename('mc_members')."WHERE uniacid=:uniacid AND uid=:uid",array(':uniacid'=>$uniacid,':uid'=>$fans['uid']));


if(substr(($member['avatar']),0,19)=='http://wx.qlogo.cn/'){
	$avatar=$user['avatar'];
}else{
		$avatar=$attachurl.$member['avatar'];
}
return $avatar;
}

function getactivetype($activetype){
	if($activetype=='1'){return'个人发起';}
	if($activetype=='2'){return'商家发起';}
	if($activetype=='3'){return'官方发起';}

}

function getactivepid($activepid){
	if($activepid=='1'){return'已屏蔽';}
	if($activepid=='2'){return'已取消';}
	if($activepid=='3'){return'待审核';}
		if($activepid=='4'){return'报名中';}
			if($activepid=='5'){return'进行中';}
				if($activepid=='6'){return'已结束';}

}

function getneeddeal($mlist,$uniacid){
	


if($mlist=='m_user'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid",array(':uniacid'=>$uniacid,':upid'=>'2'));
	return count($user);
	}
if($mlist=='m_pic'){
	$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND pic_pid=:pic_pid",array(':uniacid'=>$uniacid,':pic_pid'=>'2'));
		return count($photos);

}
if($mlist=='m_talk'){
	$talk=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_pid=:talk_pid",array(':uniacid'=>$uniacid,':talk_pid'=>'2'));
			return count($talk);

}
if($mlist=='m_active'){
	$active=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_pid=:active_pid",array(':uniacid'=>$uniacid,':active_pid'=>'3'));
	$active=count($active);
				return $active;

}

}
?>