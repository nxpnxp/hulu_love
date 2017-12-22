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

if($flag == 'view_new'){
	$uid = $_GPC['uid'];
	$openid = $_GPC['openid'];
	$order_num = $_GPC['order_num'];
	$order_price = $_GPC['order_price'];
	
	include $this->template('pay_credit1_view_new');
}
if($flag == 'doviewnew'){
	$_uid = $_GPC['uid'];
	$openid = $_GPC['openid'];
	$order_num = $_GPC['order_num'];
	$order_price = $_GPC['order_price'];
	
	$uid = pdo_fetchcolumn('select uid from '.tablename('mc_mapping_fans').' where uniacid='.$_W['uniacid'].' and openid="'.$_W['openid'].'" ');
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
			
			$order_old=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_num=:order_num",array(':uniacid'=>$_W['uniacid'],':order_num'=>$order_num));

			if(empty($order_old)){			
				$order=array(
					'uniacid'=>$_W['uniacid'],
					'order_pid'=>'2',
					'order_type'=>'2',
					'order_num'=>$order_num,
					'order_price'=>$order_price,
					'order_openid'=>$_W['openid'],
					'order_starttime'=>$_W['timestamp'],			
					'order_endtime'=>$_W['timestamp'],			
					'order_ip'=>$_W['clientip'],
					'order_container'=>$_W['container'],
					'order_os'=>$_W['os'],
					'order_two'=>$openid,
				);
				pdo_insert('hulu_love_order',$order);
			}else{
				pdo_update('hulu_love_order',array(
					'order_pid'=>'2',
					'order_type' => '2',			
					'order_endtime'=>$_W['timestamp'],	
				),array(
					'uniacid' => $_W['uniacid'],
					'order_num' => $order_num					
				));
			}
			
			$contact=array(
				'uniacid'=>$_W['uniacid'],
				'openid'=>$openid,
				'contact_openid'=>$_W['openid'],
				'contact_price'=>$order_price,			
				'contact_time'=>$_W['timestamp'],			
				'contact_ip'=>$_W['clientip'],
				'contact_container'=>$_W['container'],
				'contact_os'=>$_W['os'],
			);
			pdo_insert('hulu_love_contact',$contact);
			
			$url = $this->createMobileUrl('view',array('uid'=>$_uid));
			header('Location:'.$url);die;
		}else{
			message('扣除积分失败！',$this->createMobileUrl('home'),'error');die;
		}
		
		//message('积分支付成功！',$this->createMobileUrl('view',array('uid'=>$uid,'ischeckpayc1'=>0)),'success');die;
	}
	message('操作有误！',$this->createMobileUrl('home'),'error');die;
}

?>