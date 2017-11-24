<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid']));

if($active['active_pid'] != 4){
	message('抱歉，当前活动状态不可报名！',$this->createMobileUrl('active'),'error');die;
}

$my_join=pdo_fetch("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['vid'],':openid'=>$_W['openid']));

	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

	//判断会员等级 
	if($user['upid'] == '3'){
		//普通会员   去支付
	}elseif($user['upid'] == '4'){
		//VIP会员   报名成功
		$_data=array(
			'uniacid'=>$_W['uniacid'],
			'join_pid'=>'3',		
			'openid'=>$_W['openid'],
			'join_sex'=>$user['sex'],
			'active_id'=>$_GPC['vid'],
			'join_name'=>$user['nickname'],
			'join_wechat'=>$user['wechat'],
			'join_tel'=>$user['tel'],
		
			'join_time'=>$_W['timestamp'],
			'join_ip'=>$_W['clientip'],
			'join_container'=>$_W['container'],
			'join_os'=>$_W['os'],
			);

		$_res=pdo_insert('hulu_love_join',$_data);
		
		if(!empty($_res)){
			message('恭喜！报名成功！',$this->createMobileUrl('active'),'success');
		}else{
			message('抱歉！报名失败！请重试...',$this->createMobileUrl('active'),'error');
		}
		die();
		
	}else{
		//其他 游客  去认证完善资料
		message('抱歉！您是游客！请先前往认证并完善资料！',$this->createMobileUrl('real'),'error');die;
	}

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
$order_price=(($active['active_money'])*($make['make_active_pay']));

if($_W['ispost']){

	if(checksubmit('submit')){
		$joindata=array(
			'uniacid'=>$_W['uniacid'],
			'join_pid'=>'2',
		
			'openid'=>$_W['openid'],
				'join_sex'=>$user['sex'],
			'active_id'=>$_GPC['vid'],
			'join_name'=>$_GPC['join_name'],
			'join_wechat'=>$_GPC['join_wechat'],
			'join_tel'=>$_GPC['join_tel'],
		
			'join_time'=>$_W['timestamp'],
			'join_ip'=>$_W['clientip'],
			'join_container'=>$_W['container'],
			'join_os'=>$_W['os'],
			);

		$res=pdo_insert('hulu_love_join',$joindata);
		
		if(!empty($res)){
			$join_id = pdo_insertid();
			message('恭喜！报名成功！请支付活动金',$this->createMobileUrl('pay_seven',array('join_id'=>$join_id,'order_num'=>$order_num,'order_price'=>$order_price)),'success');
		}else{
			message('抱歉！报名失败！请重试...',$this->createMobileUrl('active'),'error');
		}
	
	}

}else{





	

if($user['sex']=='1'||$user['sex']=='2'){


if(empty($my_join)){

include $this->template('active_join');



}elseif($my_join['join_pid']=='2'){

message('报名成功,只差支付活动定金！',$this->createMobileUrl('pay_seven',array('join_id'=>$join_id,'order_num'=>$order_num,'order_price'=>$order_price)),'success');

}elseif($my_join['join_pid']=='3'){

message('活动报名成功！已经支付过活动定金！请等待活动开始！',$this->createMobileUrl('active_view',array('vid'=>$_GPC['vid'])),'success');
}

else{}



}else{

message('请先完善性别资料！',$this->createMobileUrl('my'),'error');
}


}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>