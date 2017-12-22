<?php

global $_W,$_GPC;


if($_GPC['join_type']==2){
$aid = pdo_fetchcolumn("select active_id from " .tablename('hulu_love_join'). " where join_id={$_GPC['join_id']}");
$uid = pdo_fetchcolumn("select uid from ".tablename('mc_mapping_fans')." WHERE uniacid={$_W['uniacid']} and openid = '{$_W['openid']}'");
$jifen = pdo_fetchcolumn("select credit1 from ".tablename('mc_members')." WHERE uid=$uid and uniacid={$_W['uniacid']}");
if($jifen<1000){
	pdo_delete('hulu_love_join', array('join_id' => $_GPC['join_id']));
	message('报名需要1000积分，您的积分不足',$this->createMobileUrl('active_view',array('vid'=>$aid)),'error');
}else{
	$jf = $jifen-1000;
	pdo_update('mc_members', array('credit1'=>$jf), array('uniacid' => $_W['uniacid'], 'uid' => $uid));
	$newuser = array('join_pid' => 3);
	pdo_update('hulu_love_join', $newuser, array('join_id' =>$_GPC['join_id']));
	
	message('报名成功！', $this->createMobileUrl('active_view',array('vid'=>$aid)), 'success');
}

exit;
}



$fee = floatval($_GPC['order_price']);
	if($fee <= 0) {
		message('支付错误, 金额小于0');
	}
	// 一些业务代码。
	//构造支付请求中的参数
	$params = array(
		'tid' => $_GPC['order_num'],      //充值模块中的订单号，此号码用于业务模块中区分订单，交易的识别码
		'ordersn' => $_GPC['order_num'],   //收银台中显示的订单号
		'title' => '参与活动定金',          //收银台中显示的标题
		'fee' => $fee,      //收银台中显示需要支付的金额,只能大于 0
		//'user' => $_W['member']['uid'],     //付款用户, 付款的用户名(选填项)
	);

	$order_old=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_num=:order_num",array(':uniacid'=>$_W['uniacid'],':order_num'=>$_GPC['order_num']));

if(empty($order_old)){

	$order=array(
	'uniacid'=>$_W['uniacid'],
	'order_pid'=>'1',
		'order_type'=>'7',
	'order_num'=>$_GPC['order_num'],
	'order_price'=>$fee,
	'order_openid'=>$_W['openid'],
	'order_starttime'=>$_W['timestamp'],
	
		'order_ip'=>$_W['clientip'],
	'order_container'=>$_W['container'],
	'order_os'=>$_W['os'],
		'order_seven'=>$_GPC['join_id'],
	);
	pdo_insert('hulu_love_order',$order);
}
	//调用pay方法
	$this->pay($params);

?>