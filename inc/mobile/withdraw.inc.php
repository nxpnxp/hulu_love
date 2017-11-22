<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

$nowmoney=pdo_fetchall("SELECT * FROM".tablename('hulu_love_money')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

foreach($nowmoney as $key=>$nowmoney){
	$money+=$nowmoney['money_price'];
}


$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if(empty($more['more_withdraw_wechat'])||empty($more['more_withdraw_wechat_qrcode'])||empty($more['more_withdraw_alipay'])||empty($more['more_withdraw_alipay_qrcode'])){

	echo"<script>alert('请先完成提现账户资料')</script>";
	load()->func('tpl');
include $this->template('withdraw_edit');


}else{

	$with=pdo_fetchall("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY with_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


include $this->template('withdraw');


}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束

?>