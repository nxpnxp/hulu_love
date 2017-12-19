<?php

global $_W,$_GPC;
include 'function.php';
//最新
if($_GPC['vid']=='1'){
	
	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid']));
	include $this->template('userlist');

//找女友
}elseif($_GPC['vid']=='2'){
	$title = '找女友';
	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 AND sex=:sex ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':sex'=>'2'));
	include $this->template('userlist');

//找男友
}elseif($_GPC['vid']=='3'){
	$title = '找男友';
	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND sex=:sex AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':sex'=>'1'));
	include $this->template('userlist');

//实名认证
}elseif($_GPC['vid']=='4'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND ureal=:ureal AND upid!=1&&upid!=2 ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':ureal'=>'2'));
	include $this->template('userlist');

//VIP
}elseif($_GPC['vid']=='5'){
	$title = 'VIP';
	//$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid AND vip_endtime>=".$_W['timestamp']." ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'4'));
	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid=:upid ORDER BY uid DESC",array(':uniacid'=>$_W['uniacid'],':upid'=>'4'));
	
	foreach ($user as $k => $v) {
		$img = pdo_fetchcolumn("SELECT pic_url FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY pic_time desc limit 1",array(':uniacid'=>$_W['uniacid'],':openid'=>$v['openid']));
		if($img){
			$user[$k]['realimg'] = $img;
		}else{
			$user[$k]['realimg'] = 'images/global/noavatar_middle.gif';
		}
	}
	
	include $this->template('userlist_vip');

//排行榜
}elseif($_GPC['vid']=='6'){
$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 ORDER BY view DESC",array(':uniacid'=>$_W['uniacid']));
	include $this->template('userlist');

//速配
}elseif($_GPC['vid']=='7'){
	$title = '速配';
	$request = pdo_fetch('select * from'.tablename('hulu_love_request').'where uniacid=:uniacid and openid=:openid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$flag = true;
	if( empty($request['request_age_small']) || empty($request['request_age_big']) ){ $flag = false; }
	if( empty($request['request_height_small']) || empty($request['request_height_big']) ){ $flag = false; }
	if( empty($request['request_weight_small']) || empty($request['request_weight_big']) ){ $flag = false; }
	if( empty($request['request_salary']) ){ $flag = false; }
	if( empty($request['request_education']) ){ $flag = false; }
	if(!$flag){
		message('抱歉！速配请先完善择偶要求！',$this->createMobileUrl('request'),'error');die;
	}
	
	$user=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND upid!=1&&upid!=2 ORDER BY view DESC",array(':uniacid'=>$_W['uniacid']));
	
	$me = pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid ",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
		
	foreach ($user as $k => $v) {
		
		//去除本人
		if($v['openid'] == $_W['openid']){
			unset($user[$k]);continue;
		}
		//去除同性别
		if($v['sex'] == $me['sex']){
			unset($user[$k]);continue;
		}
		
		$this_flag = false;
		if( ($request['request_age_small'] <= $v['age']) && ($request['request_age_big'] >= $v['age']) ){
				$this_flag = true;
		}else{ unset($user[$k]);continue; }
		
		if( ($request['request_height_small'] <= $v['height']) && ($request['request_height_big'] >= $v['height']) ){			
				$this_flag = true;
		}else{ unset($user[$k]);continue; }
		
		if( ($request['request_weight_small'] <= $v['weight']) && ($request['request_weight_big'] >= $v['weight']) ){			
				$this_flag = true;
		}else{ unset($user[$k]);continue; }
		
		if($request['request_education'] == $v['xueli']){
				$this_flag = true;
		}else{ unset($user[$k]);continue; }
		
		if($request['request_salary'] == '1'){
			//不在乎
		}elseif($request['request_salary'] == '2'){
			//0-10
			if( (0<=$v['xinzi']) && ($v['xinzi']<10) ){
					$this_flag = true;
			}else{ unset($user[$k]);continue; }
		}elseif($request['request_salary'] == '3'){
			//10-20
			if( (10<=$v['xinzi']) && ($v['xinzi']<20) ){
					$this_flag = true;
			}else{ unset($user[$k]);continue; }
		}elseif($request['request_salary'] == '4'){
			//20-50
			if( (20<=$v['xinzi']) && ($v['xinzi']<50) ){
					$this_flag = true;
			}else{ unset($user[$k]);continue; }
		}elseif($request['request_salary'] == '5'){
			//50+
			if( 50<=$v['xinzi'] ){
					$this_flag = true;
			}else{ unset($user[$k]);continue; }
		}
		
		
	}
	
	include $this->template('userlist');

}else{}
?>