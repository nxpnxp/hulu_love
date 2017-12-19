<?php

global $_W,$_GPC;
include 'function.php';

$flag = $_GPC['flag'];
$visitor=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($flag == 'view'){
	$uid = $_GPC['uid'];
	include $this->template('pay_credit1_view');
}
if($flag == 'doview'){
	$_uid = $_GPC['uid'];
	$openid = $visitor['openid'];
	$uid = pdo_fetchcolumn('select uid from '.tablename('mc_mapping_fans').' where uniacid='.$_W['uniacid'].' and openid="'.$openid.'" ');
	if($uid){
		$credit1 = pdo_fetchcolumn('select credit1 from '.tablename('mc_members').' where uid='.$uid);
		if($credit1 < 5){
			message('积分不足！',$this->createMobileUrl('home'),'error');die;
		}
		$new_credit = $credit1 - 5;
		$res = pdo_update('mc_members',array(
			'credit1' => $new_credit
		),array(
			'uid' => $uid
		));
		if($res){
			$url = $this->createMobileUrl('view',array('uid'=>$_uid,'ischeckpayc1'=>'no'));
			header('Location:'.$url);die;
		}else{
			message('扣除积分失败！',$this->createMobileUrl('home'),'error');die;
		}
		
		//message('积分支付成功！',$this->createMobileUrl('view',array('uid'=>$uid,'ischeckpayc1'=>0)),'success');die;
	}
	message('操作有误！',$this->createMobileUrl('home'),'error');die;
}


?>