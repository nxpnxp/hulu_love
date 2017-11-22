<?php

global $_W,$_GPC;
//include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		$userdata=array(

			'nickname'=>$_GPC['nickname'],
				'upid'=>$_GPC['upid'],
				'vip_endtime'=>$_GPC['vip_endtime'],
				'contact_money'=>$_GPC['contact_money'],
				'ureal'=>$_GPC['ureal'],

		'sex'=>$_GPC['sex'],
		'bornyear'=>strtotime($_GPC['bornyear']),
			'height'=>$_GPC['height'],
			'weight'=>$_GPC['weight'],
			'purpose'=>$_GPC['purpose'],
			'feeling'=>$_GPC['feeling'],
			'married'=>$_GPC['married'],
			'wechat'=>$_GPC['wechat'],
			'tel'=>$_GPC['tel'],
			'city'=>$_GPC['city'],
			'address'=>$_GPC['address'],
			'content'=>$_GPC['content'],
			'lon'=>$_GPC['lon'],
			'lat'=>$_GPC['lat'],
			);
	
		
		$res=pdo_update('hulu_love_user',$userdata,array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid']));
		if(!empty($res)){
			message('恭喜！修改成功！',$this->createWebUrl('user'),'success');
		}else{
			message('抱歉！修改失败！',$this->createWebUrl('user'),'error');
		}
	}

}else{


$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

$city=pdo_fetchall("SELECT * FROM".tablename('hulu_love_city')."WHERE uniacid=:uniacid AND city_pid=:city_pid ORDER BY city_did ASC",array(':uniacid'=>$_W['uniacid'],':city_pid'=>'1'));


if(!empty($_GPC['openid'])){	
	if(!empty($user)){
		if($user['uniacid']==$_W['uniacid']){

include $this->template('web/page/user_edit');


		}else{			message('你无权修改此会员信息！',$this->createWebUrl('user'),'error');		}
	}else{		message('该会员信息不存在！',$this->createWebUrl('user'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('user'),'error');}


}
?>