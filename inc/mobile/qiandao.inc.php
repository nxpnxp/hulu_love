<?php

global $_W,$_GPC;

include 'function.php';

$flag = $_GPC['flag'];

if($flag == 'doqd'){
	if($_W['isajax']){
		$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
		$date = date('Y-m-d',time());
		$adata = explode("-" ,$date);
		$y = $adata[0];
		$m = $adata[1];
		$d = $adata[2];
		$num = pdo_insert('shopping_qiandao',array(
			'uid'=>$uid,'y'=>$y,'m'=>$m,'d'=>$d
		));	
		if($num){
			$_cdt = 10; //增加积分数量
			$credit1 = pdo_fetchcolumn('select credit1 from'.tablename('mc_members').'where uid=:uid ',array(':uid'=>$uid));
			$newcredit1 = $credit1+$_cdt;
		    pdo_update('mc_members',array(
				'credit1' => $newcredit1
			),array(
				'uid'=>$uid
			));
			//记录积分日志
			//....
			echo $num;
		}else{
			echo 0;
		}
		exit;
	}
}elseif($flag == 'getc1'){
	if($_W['isajax']){
	$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$credit1 = pdo_fetchcolumn('select credit1 from'.tablename('mc_members').'where uid=:uid ',array(':uid'=>$uid));
	echo json_encode($credit1);
	die;
	}
}elseif($flag == 'ifqd'){
	if($_W['isajax']){
	$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$date = date('Y-m-d',time());
	$adata = explode("-" ,$date);
	$y = $adata[0];
	$m = $adata[1];
	$d = $adata[2];
	$flag = pdo_fetch('select * from '.tablename('shopping_qiandao').' where uid=:uid and y=:y and m=:m and d=:d',array(':uid'=>$uid,':y'=>$y,':m'=>$m,':d'=>$d));
	if($flag){
		echo 1;
	}else{
		echo 0;
	}
	exit;
	}
}elseif($flag == 'getqd'){
	if($_W['isajax']){
	$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$date = date('Y-m-d',time());
	$adata = explode("-" ,$date);
	$y = $adata[0];
	$m = $adata[1];
	$d = $adata[2];
	$data =  pdo_fetchall('select * from '.tablename('shopping_qiandao').' where uid=:uid and y=:y and m=:m',array(':uid'=>$uid,':y'=>$y,':m'=>$m));
	echo json_encode($data);exit;
	}
}else{
	//我的积分
	$uid = pdo_fetchcolumn('select uid from'.tablename('mc_mapping_fans').'where openid=:openid and uniacid=:uniacid',array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	$credit1 = pdo_fetchcolumn('select credit1 from'.tablename('mc_members').'where uid=:uid ',array(':uid'=>$uid));
		
	include $this->template('qiandao');
}

die;

?>