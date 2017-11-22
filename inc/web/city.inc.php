<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		
		
		$citydata=array(
			'uniacid'=>$_W['uniacid'],
			'city_pid'=>$_GPC['city_pid'],
			'city_did'=>$_GPC['city_did'],
			'city_type'=>$_GPC['city_type'],
			'city_name'=>$_GPC['city_name'],
		
			'city_value'=>$_GPC['city_value'],
			'city_time'=>$_W['timestamp'],
			'city_ip'=>$_W['clientip'],
			);
			
			
		$res=pdo_insert('hulu_love_city',$citydata);

				if(!empty($res)){
				message('恭喜，添加成功！',$this->createWebUrl('city'),'success');
			}else{
				message('抱歉，添加失败！',$this->createWebUrl('city'),'error');
			}
		
	}

}else{


$city=pdo_fetchall("SELECT * FROM".tablename('hulu_love_city')."WHERE uniacid=:uniacid ORDER BY city_did ASC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/city');
}
?>