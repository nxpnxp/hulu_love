<?php

global $_W,$_GPC;
include 'function.php';

if($_W['ispost']){
	if(checksubmit('submit')){
		
		
		$adsdata=array(
			'uniacid'=>$_W['uniacid'],
			'ads_pid'=>$_GPC['ads_pid'],
			'ads_did'=>$_GPC['ads_did'],
			
			'ads_title'=>$_GPC['ads_title'],
		
			'ads_pic'=>$_GPC['ads_pic'],
				'ads_link'=>$_GPC['ads_link'],
			'ads_time'=>$_W['timestamp'],
			'ads_ip'=>$_W['clientip'],
			);
			
			
		$res=pdo_insert('hulu_love_ads',$adsdata);

				if(!empty($res)){
				message('恭喜，添加成功！',$this->createWebUrl('ads'),'success');
			}else{
				message('抱歉，添加失败！',$this->createWebUrl('ads'),'error');
			}
		
	}

}else{


$ads=pdo_fetchall("SELECT * FROM".tablename('hulu_love_ads')."WHERE uniacid=:uniacid ORDER BY ads_did ASC",array(':uniacid'=>$_W['uniacid']));

$moreads1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'1'));

$moreads2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'2'));

if(empty($moreads1)){
	$data1=array(
		'uniacid'=>$_W['uniacid'],
		'moreads_page'=>'1',
		'moreads_pic'=>'',
		'moreads_title'=>'',
		'moreads_link'=>'',
		'moreads_time'=>$_W['timestamp'],
		'moreads_ip'=>$_W['clientip'],
		);
	pdo_insert('hulu_love_moreads',$data1);
	}
if(empty($moreads2)){
	$data2=array(
		'uniacid'=>$_W['uniacid'],
		'moreads_page'=>'2',
		'moreads_pic'=>'',
		'moreads_title'=>'',
		'moreads_link'=>'',
		'moreads_time'=>$_W['timestamp'],
		'moreads_ip'=>$_W['clientip'],
		);
		pdo_insert('hulu_love_moreads',$data2);


}


$moreads1=pdo_fetch("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'1'));

$moreads2=pdo_fetch("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'2'));
include $this->template('web/ads');


}
?>