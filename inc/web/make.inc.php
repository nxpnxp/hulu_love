<?php

global $_W,$_GPC;


if($_W['ispost']){
	if(checksubmit('submit')){

		$newmake=array(

	'make_vip_year'=>$_GPC['make_vip_year'],
	'make_vip_quarter'=>$_GPC['make_vip_quarter'],
	'make_vip_month'=>$_GPC['make_vip_month'],
	'make_vip_watch_oneday'=>$_GPC['make_vip_watch_oneday'],
	'make_news_oneday'=>$_GPC['make_news_oneday'],

		

			'make_active_pay'=>$_GPC['make_active_pay'],
		'make_contact_show'=>$_GPC['make_contact_show'],
			'make_contact_girlmoney'=>$_GPC['make_contact_girlmoney'],
						'make_contact_boymoney'=>$_GPC['make_contact_boymoney'],
			'make_contact_nomoney'=>$_GPC['make_contact_nomoney'],

  'make_two_divided'=>$_GPC['make_two_divided'],
	'make_three_divided'=>$_GPC['make_three_divided'],
	'make_four_divided'=>$_GPC['make_four_divided'],
	'make_five_divided'=>$_GPC['make_five_divided'],
	'make_nine_divided'=>$_GPC['make_nine_divided'],

'make_share_money'=>$_GPC['make_share_money'],
	'make_withdraw_money'=>$_GPC['make_withdraw_money'],

		'make_uid_start'=>$_GPC['make_uid_start'],
'make_reg_upid'=>$_GPC['make_reg_upid'],

		'make_girl_money'=>$_GPC['make_girl_money'],
		'make_girl_age'=>$_GPC['make_girl_age'],
		'make_girl_height'=>$_GPC['make_girl_height'],
		'make_girl_weight'=>$_GPC['make_girl_weight'],

			'make_boy_money'=>$_GPC['make_boy_money'],
		'make_boy_age'=>$_GPC['make_boy_age'],
		'make_boy_height'=>$_GPC['make_boy_height'],
		'make_boy_weight'=>$_GPC['make_boy_weight'],

				'make_no_money'=>$_GPC['make_no_money'],
		'make_no_age'=>$_GPC['make_no_age'],
		'make_no_height'=>$_GPC['make_no_height'],
		'make_no_weight'=>$_GPC['make_no_weight'],
		
				'make_time'=>$_W['timestamp'],
					'make_ip'=>$_W['clientip'],
	);
	$res=pdo_update('hulu_love_make',$newmake,array('uniacid'=>$_W['uniacid']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('make'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('make'),'error');
			}

	
	}
}else{

	$make=pdo_fetchall("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

if(empty($make)){

	$make=array(
	'uniacid'=>$_W['uniacid'],
	

	'make_vip_year'=>'388.00',
	'make_vip_quarter'=>'288.00',
	'make_vip_month'=>'248.00',
	'make_vip_watch_oneday'=>'5',
	'make_news_oneday'=>'3',

'make_active_pay'=>'0.10',
		'make_contact_show'=>'1',
			'make_contact_girlmoney'=>'39.00',
						'make_contact_boymoney'=>'1.00',
			'make_contact_nomoney'=>'5.00',


  'make_two_divided'=>'0.50',
	'make_three_divided'=>'0.60',
	'make_four_divided'=>'0.70',
	'make_five_divided'=>'0.80',
'make_nine_divided'=>'0.90',

'make_share_money'=>'1.00',
	'make_withdraw_money'=>'100.00',

	'make_uid_start'=>'10000',
		'make_reg_upid'=>'2',

		'make_girl_money'=>'30.00',
		'make_girl_age'=>'20',
		'make_girl_height'=>'165',
		'make_girl_weight'=>'50',

			'make_boy_money'=>'10',
		'make_boy_age'=>'24',
		'make_boy_height'=>'186',
		'make_boy_weight'=>'65',

				'make_no_money'=>'10',
		'make_no_age'=>'22',
		'make_no_height'=>'175',
		'make_no_weight'=>'60',
		
				'make_time'=>$_W['timestamp'],
					'make_ip'=>$_W['clientip'],
	);
				pdo_insert('hulu_love_make',$make);

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

	include $this->template('web/make');
}else{

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
include $this->template('web/make');
}
}
?>