<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($_W['ispost']){
	if(checksubmit('submit')){

		if($user['sex']=='1'||$user['sex']=='2'){$sex=$user['sex'];}else{$sex=$_GPC['sex'];}


		$userdata=array(
		'house'=>$_GPC['house'],
		'car'=>$_GPC['car'],
		'sex'=>$sex,
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
			);
		$res=pdo_update('hulu_love_user',$userdata,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
		if(!empty($res)){
			message('恭喜！修改成功！',$this->createMobileUrl('my'),'success');
		}else{
			message('抱歉！修改失败！',$this->createMobileUrl('update'),'error');
		}
	
	}

}else{
$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$city=pdo_fetchall("SELECT * FROM".tablename('hulu_love_city')."WHERE uniacid=:uniacid AND city_pid=:city_pid ORDER BY city_id ASC",array(':uniacid'=>$_W['uniacid'],':city_pid'=>'1'));


include $this->template('update');
}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>