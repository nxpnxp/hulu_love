<?php

global $_W,$_GPC;

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$fee = floatval($_GPC['up_vip']);
	if($fee <= 0) {
		message('支付错误, 金额小于0');
	}
	// 一些业务代码。
	//构造支付请求中的参数
	$params = array(
		'tid' => $_GPC['order_num'],      //充值模块中的订单号，此号码用于业务模块中区分订单，交易的识别码
		'ordersn' => $_GPC['order_num'],   //收银台中显示的订单号
		'title' => '升级VIP',          //收银台中显示的标题
		'fee' => $fee,      //收银台中显示需要支付的金额,只能大于 0
		//'user' => $_W['member']['uid'],     //付款用户, 付款的用户名(选填项)
	);
	//调用pay方法

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
if($fee==$make['make_vip_year']){$vip_days='365';}
elseif($fee==$make['make_vip_quarter']){$vip_days='92';}
elseif($fee==$make['make_vip_month']){$vip_days='31';}else{};

	$order_old=pdo_fetchall("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_num=:order_num",array(':uniacid'=>$_W['uniacid'],':order_num'=>$_GPC['order_num']));

if(empty($order_old)){

	$order=array(
	'uniacid'=>$_W['uniacid'],
	'order_pid'=>'1',
		'order_type'=>'1',
	'order_num'=>$_GPC['order_num'],
	'order_price'=>$fee,
	'order_openid'=>$_W['openid'],
	'order_starttime'=>$_W['timestamp'],
	
		'order_ip'=>$_W['clientip'],
	'order_container'=>$_W['container'],
	'order_os'=>$_W['os'],
		'order_one'=>$vip_days,
	);
	pdo_insert('hulu_love_order',$order);

}
	$this->pay($params);

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>