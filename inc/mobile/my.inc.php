<?php

global $_W;
//判断头部开始
if($_W['container']=='wechat'){
	if(!empty($_W['openid'])){
//判断头部结束

include'function.php';
//查找用户
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

//配置
$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

//管理员
$admin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_did=:admin_did ORDER BY admin_did DESC",array(':uniacid'=>$_W['uniacid'],':admin_did'=>'2'));
$guanli=pdo_fetch("SELECT * FROM".tablename('hulu_love_guanli')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

$admin_openid=isset($admin[0]['openid'])?$admin[0]['openid']:$guanli['guanli_openid'];


if(empty($user)){

//如果是男性
	if($_W['fans']['tag']['sex']=='1'){
		$moreuser=array(
			'bornyear'=>$_W['timestamp']-((rand(18,38))*31536000),	
			'height'=>(rand(170,190)),
			'weight'=>(rand(50,80)),			
			);
		$start_money=$make['make_boy_money'];

	}elseif($_W['fans']['tag']['sex']=='2'){
		$moreuser=array(
		'bornyear'=>$_W['timestamp']-((rand(18,35))*31536000),
			'height'=>(rand(155,175)),
			'weight'=>(rand(40,70)),

		
			);
		$start_money=$make['make_girl_money'];
	}elseif($_W['fans']['tag']['sex']=='0'){
	
		$moreuser=array(
			'bornyear'=>$_W['timestamp']-((rand(18,38))*31536000),
			'height'=>(rand(160,180)),
			'weight'=>(rand(45,75)),

	
			);
		
		$start_money=$make['make_no_money'];
	}else{}

		$userdata=array(
			'uniacid'=>$_W['uniacid'],
			'upid'=>$make['make_reg_upid'],
			'openid'=>$_W['openid'],
			'nickname'=>$_W['fans']['nickname'],
			'avatar'=>$_W['fans']['tag']['avatar'],
			'sex'=>$_W['fans']['tag']['sex'],

			'logintime'=>$_W['timestamp'],
			'loginip'=>$_W['clientip'],
			'logincontainer'=>$_W['container'],
			'loginos'=>$_W['os'],
			'regtime'=>$_W['timestamp'],
			'regip'=>$_W['clientip'],

		);

		pdo_insert('hulu_love_user',array_merge($userdata,$moreuser));
		
		//择偶要求
		$newrequest=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'request_time'=>$_W['timestamp'],
			'request_ip'=>$_W['clientip'],
			'request_container'=>$_W['container'],
			'request_os'=>$_W['os'],

		);
		pdo_insert('hulu_love_request',$newrequest);
		
		//更多资料
		$more=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'more_time'=>$_W['timestamp'],
			'more_ip'=>$_W['clientip'],
			'more_container'=>$_W['container'],
			'more_os'=>$_W['os'],

			);		
		pdo_insert('hulu_love_more',$more);
		
		//注册赠送
		$moneydata=array(
			'uniacid'=>$_W['uniacid'],
			'money_pid'=>'1',
			'money_type'=>'5',
			'openid'=>$_W['openid'],
			'money_openid'=>$admin_openid,
			'money_price'=>$start_money,
			'money_time'=>$_W['timestamp'],
			'money_ip'=>$_W['clientip'],
			'money_container'=>$_W['container'],
			'money_os'=>$_W['os'],
			);
		pdo_insert('hulu_love_money',$moneydata);

		//系统预支出
		$system=array(
				'uniacid'=>$_W['uniacid'],
			'system_pid'=>'2',
			'system_type'=>'5',
			'openid'=>$_W['openid'],
			'system_openid'=>$admin_openid,
			'system_price'=>$start_money,
			'system_time'=>$_W['timestamp'],
			'system_ip'=>$_W['clientip'],
			'system_container'=>$_W['container'],
			'system_os'=>$_W['os'],
			);
		pdo_insert('hulu_love_system',$system);

		//分享推广分析
		if($_SESSION['share']&&$_SESSION['share']!=$_W['openid']){

			$newshare=array(
				'uniacid'=>$_W['uniacid'],
				'openid'=>$_W['openid'],
				'share_openid'=>$_SESSION['share'],
				//'share_money'=>$make['make_share_money'],
				'share_money'=>0,
				'share_time'=>$_W['timestamp'],
				'share_ip'=>$_W['clientip'],
				'share_container'=>$_W['container'],
				'share_os'=>$_W['os'],

			);
			pdo_insert('hulu_love_share',$newshare);
			$n_res = pdo_insertid();
			
			$count = pdo_fetchcolumn('select count(*) from '.tablename('hulu_love_share').' where uniacid='.$_W['uniacid'].' and share_openid="'.$_SESSION['share'].'" ');
			$n_money = $make['make_share_money'];//返还金额  后台设置【分享获得收益金额】
			if($count && ($count%2 == 0) ){
				$is_back_money = pdo_fetchcolumn('select count(*) from '.tablename('hulu_love_share').' where uniacid='.$_W['uniacid'].' and share_openid="'.$_SESSION['share'].'" and share_money='.$n_money);
				if($is_back_money > 0){
					//已返过金额 返积分
					$uid = pdo_fetchcolumn('select uid from '.tablename('mc_mapping_fans').' where uniacid='.$_W['uniacid'].' and openid="'.$_SESSION['share'].'" ');
					if($uid){
						$credit1 = pdo_fetchcolumn('select credit1 from '.tablename('mc_members').' where uid='.$uid);
						$new_credit = $credit1 + 10;
						pdo_update('mc_members',array(
							'credit1' => $new_credit
						),array(
							'uid' => $uid
						));
					}
					
				}else{
					//返金额
					pdo_update('hulu_love_share',array(
						'share_money' => $n_money
					),array(
						'share_id' => $n_res
					));
				}
			}
			
			$sharemoney=array(
				'uniacid'=>$_W['uniacid'],
				'money_pid'=>'2',
				'money_type'=>'6',
				'openid'=>$_SESSION['share'],
				'money_openid'=>$_W['openid'],
				
				'money_price'=>$make['make_share_money'],
				'money_time'=>$_W['timestamp'],
				'money_ip'=>$_W['clientip'],
				'money_container'=>$_W['container'],
				'money_os'=>$_W['os'],
			);
			pdo_insert('hulu_love_money',$sharemoney);

			$sharesystem=array(
				'uniacid'=>$_W['uniacid'],
				'system_pid'=>'2',
				'system_type'=>'6',
				'openid'=>$_W['openid'],
				'system_openid'=>$admin_openid,
				'system_price'=>$make['make_share_money'],
				'system_time'=>$_W['timestamp'],
				'system_ip'=>$_W['clientip'],
				'system_container'=>$_W['container'],
				'system_os'=>$_W['os'],
			);
			pdo_insert('hulu_love_system',$sharesystem);

			unset($_SESSION['share']);
			session_destroy();
		}




}else{

	$newuser=array(
	
		'logintime'=>$_W['timestamp'],
			'loginip'=>$_W['clientip'],
			'logincontainer'=>$_W['container'],
			'loginos'=>$_W['os'],
			
	);
	pdo_update('hulu_love_user',$newuser,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
	



}


$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

//收益记录
$nowmoney=pdo_fetchall("SELECT * FROM".tablename('hulu_love_money')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

foreach($nowmoney as $key=>$nowmoney){
	$money+=$nowmoney['money_price'];
}


//粉丝其他资料
$fans=pdo_fetch("SELECT * FROM".tablename('mc_mapping_fans')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$member=pdo_fetch("SELECT * FROM".tablename('mc_members')."WHERE uniacid=:uniacid AND uid=:uid",array(':uniacid'=>$_W['uniacid'],':uid'=>$fans['uid']));


if(substr(($member['avatar']),0,19)=='http://wx.qlogo.cn/'){
	$avatar=$member['avatar'];
}else{
		$avatar=$_W['attachurl'].$member['avatar'];
}

//暗恋我的
$likeme=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
$likeme_num=count($likeme);
//我暗恋的
$ilike=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND like_openid=:like_openid",array(':uniacid'=>$_W['uniacid'],':like_openid'=>$_W['openid']));
$ilike_num=count($ilike);
//访客
$visitor=pdo_fetchall("SELECT * FROM".tablename('hulu_love_viewer')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
$visitor_num=count($visitor);
//更多资料
$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
//提现记录
$withdraw=pdo_fetchall("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));



$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

$store=pdo_fetchall("SELECT * FROM".tablename('hulu_love_store')."WHERE uniacid=:uniacid AND openid=:openid AND store_time>=".$beginToday." AND store_time<=".$endToday." ",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


	$giftdata=pdo_fetchall("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
$one_gift=array_rand($giftdata,1);

if(empty($store)){
	$newstore=array(
		'uniacid'=>$_W['uniacid'],
		'store_pid'=>'1',
		'openid'=>$_W['openid'],
		'store_openid'=>$_W['openid'],
		'gift_id'=>(($one_gift)+1),
				'store_time'=>$_W['timestamp'],
						'store_ip'=>$_W['clientip'],
				'store_container'=>$_W['container'],
				'store_os'=>$_W['os'],		);
	pdo_insert('hulu_love_store',$newstore);

}
	
	//我的积分
	$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$credit1 = pdo_fetchcolumn('select credit1 from'.tablename('mc_members').'where uid=:uid ',array(':uid'=>$uid));
	
	include $this->template('my');

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>