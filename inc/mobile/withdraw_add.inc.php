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



if($_W['ispost']){

	if(checksubmit('submit')){

		$fee = floatval($_GPC['with_money']);
	if($fee<=0) {
		echo"提现金额必须大于0";

		
	}else{


		if($money>=$make['make_withdraw_money']){

		if($money>=$_GPC['with_money']){

		$with=array(
			'uniacid'=>$_W['uniacid'],
			'with_pid'=>'2',
			'openid'=>$_W['openid'],
			'with_money'=>(abs($_GPC['with_money'])),
			'with_content'=>$_GPC['with_content'],

			'with_time'=>$_W['timestamp'],
			'with_ip'=>$_W['clientip'],

			'with_container'=>$_W['container'],
			'with_os'=>$_W['os'],

			);
			$res=pdo_insert('hulu_love_withdraw',$with);

			$admin=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_did=:admin_did ORDER BY admin_did DESC",array(':uniacid'=>$_W['uniacid'],':admin_did'=>'2'));



			$withmoney=array(
				'uniacid'=>$_W['uniacid'],
				'money_pid'=>'2',
				'money_type'=>'8',
				'openid'=>$_W['openid'],
				'money_openid'=>$admin[0]['openid'],
				'money_price'=>(-(abs($_GPC['with_money']))),
				'money_time'=>$_W['timestamp'],
			'money_ip'=>$_W['clientip'],

			'money_container'=>$_W['container'],
			'money_os'=>$_W['os'],
				
				);
			$res=pdo_insert('hulu_love_money',$withmoney);

				if(!empty($res)){
			//message('恭喜！提现申请成功，等待管理员审核处理',$this->createMobileUrl('withdraw'),'success');

			echo"恭喜！提现申请成功！等待管理员审核处理！";
		}else{
			message('抱歉！提现申请失败！请重试！',$this->createMobileUrl('update'),'error');
		}

		}else{  				
			//message('抱歉！您的账户余额少于提现金额！',$this->createMobileUrl('update'),'error');
			echo'您的账户余额为“'.$money.'”元，不能提现“'.$_GPC['with_money'].'”元。请重新输入！';

		
		}
		}else{
				//message('抱歉！您的账户余额少于提现最低金额！',$this->createMobileUrl('update'),'error');
				//echo"<script>alert('抱歉！您的账户余额少于提现最低金额！');</script>";
				echo'满'.$make['make_withdraw_money'].'元才能提现！您的账户余额为'.$money.'元';
		
		}
	}
	}

}else{
include $this->template('withdraw_add');
}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>