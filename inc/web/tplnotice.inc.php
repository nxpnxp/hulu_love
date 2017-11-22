<?php


global $_W,$_GPC;
$notice=pdo_fetchall("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

if($_W['ispost']){

	if(checksubmit('submit')){
		$newnotice=array(
		'uniacid'=>$_W['uniacid'],
			'notice_ads'=>$_GPC['notice_ads'],
			'notice_news_if'=>$_GPC['notice_news_if'],
				'notice_news_timegap'=>$_GPC['notice_news_timegap'],
			'notice_news_num'=>$_GPC['notice_news_num'],
			'notice_reg_if'=>$_GPC['notice_reg_if'],
			'notice_reg_num'=>$_GPC['notice_reg_num'],
           'notice_vip_if'=>$_GPC['notice_vip_if'],
			'notice_vip_num'=>$_GPC['notice_vip_num'],
			'notice_contact_if'=>$_GPC['notice_contact_if'],
			'notice_contact_num'=>$_GPC['notice_contact_num'],
			'notice_enjoy_if'=>$_GPC['notice_enjoy_if'],
			'notice_enjoy_num'=>$_GPC['notice_enjoy_num'],
			'notice_gift_if'=>$_GPC['notice_gift_if'],
			'notice_gift_num'=>$_GPC['notice_gift_num'],
			'notice_share_if'=>$_GPC['notice_share_if'],
			'notice_share_num'=>$_GPC['notice_share_num'],
			'notice_active_if'=>$_GPC['notice_active_if'],
			'notice_active_num'=>$_GPC['notice_active_num'],
			'notice_withdraw_if'=>$_GPC['notice_withdraw_if'],
			'notice_withdraw_num'=>$_GPC['notice_withdraw_num'],

		'notice_time'=>$_W['timestamp'],
		'notice_ip'=>$_W['clientip'],

		);
		$res=pdo_update('hulu_love_tplnotice',$newnotice,array('uniacid'=>$_W['uniacid']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('tplnotice'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('tplnotice'),'error');
			}
	
	
	}


}else{

if(empty($notice)){

	$oldnotice=array(
		'uniacid'=>$_W['uniacid'],

'notice_news_if'=>'1',
				'notice_news_timegap'=>'12',
			'notice_reg_if'=>'1',
           'notice_vip_if'=>'1',
			'notice_contact_if'=>'1',
			'notice_enjoy_if'=>'1',
			'notice_gift_if'=>'1',
			'notice_share_if'=>'1',
			'notice_active_if'=>'1',
			'notice_withdraw_if'=>'1',

		'notice_time'=>$_W['timestamp'],
		'notice_ip'=>$_W['clientip'],

		);
		pdo_insert('hulu_love_tplnotice',$oldnotice);
		$notice=pdo_fetch("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
			include $this->template('web/tplnotice');


}else{
$notice=pdo_fetch("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

	include $this->template('web/tplnotice');


}
}
?>