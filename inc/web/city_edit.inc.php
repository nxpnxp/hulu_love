<?php

global $_W,$_GPC;


if($_W['ispost']){
	if(checksubmit('submit')){
		
		
		$newcity=array(
			
			'city_pid'=>$_GPC['city_pid'],
			'city_did'=>$_GPC['city_did'],
			'city_type'=>$_GPC['city_type'],
			'city_name'=>$_GPC['city_name'],		
			'city_value'=>$_GPC['city_value'],
			'city_time'=>$_W['timestamp'],
			'city_ip'=>$_W['clientip'],
			);
			
			
		$res=pdo_update('hulu_love_city',$newcity,array('uniacid'=>$_W['uniacid'],'city_id'=>$_GPC['city_id']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('city'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('city'),'error');
			}
		
	}

}else{



if(!empty($_GPC['city_id'])){

	$city=pdo_fetch("SELECT * FROM".tablename('hulu_love_city')."WHERE uniacid=:uniacid AND city_id=:city_id",array(':uniacid'=>$_W['uniacid'],':city_id'=>$_GPC['city_id']));
	if(!empty($city)){
		if($city['uniacid']==$_W['uniacid']){



include $this->template('web/page/city_edit');


}else{

			message('你无权修改此城市信息！',$this->createWebUrl('city'),'error');		}
	}else{		message('该城市信息不存在！',$this->createWebUrl('city'),'error');	}
}else{	message('请勿提交非法网址！',$this->createWebUrl('city'),'error');}


}
?>