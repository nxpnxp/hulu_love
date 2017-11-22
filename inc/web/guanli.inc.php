<?php

global $_W,$_GPC;
if($_W['ispost']){

	if(checksubmit('submit')){

		$newguanli=array(
				'uniacid'=>$_W['uniacid'],
				'guanli_title'=>$_GPC['guanli_title'],
				'guanli_template'=>$_GPC['guanli_template'],
				'guanli_authcode'=>$_GPC['guanli_authcode'],
				'guanli_kefu_wechat'=>$_GPC['guanli_kefu_wechat'],
				'guanli_openid'=>$_GPC['guanli_openid'],

			'guanli_key'=>$_GPC['guanli_key'],
				'guanli_secret'=>$_GPC['guanli_secret'],
				'guanli_sign'=>$_GPC['guanli_sign'],
					'guanli_msgtemplate'=>$_GPC['guanli_msgtemplate'],

				'guanli_fengmian_marquee'=>$_GPC['guanli_fengmian_marquee'],
									'guanli_share_title'=>$_GPC['guanli_share_title'],
				'guanli_share_content'=>$_GPC['guanli_share_content'],
				'guanli_share_pic'=>$_GPC['guanli_share_pic'],


				'guanli_time'=>$_W['timestamp'],
				'guanli_ip'=>$_W['clientip'],
				
			);

			
			$res=pdo_update('hulu_love_guanli',$newguanli,array('uniacid'=>$_W['uniacid']));

				if(!empty($res)){
				message('恭喜，修改成功！',$this->createWebUrl('guanli'),'success');
			}else{
				message('抱歉，修改失败！',$this->createWebUrl('guanli'),'error');
			}

	}


}else{
		$guanli=pdo_fetchall("SELECT * FROM".tablename('hulu_love_guanli')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));


		if(empty($guanli)){
			$nowguanli=array(
				'uniacid'=>$_W['uniacid'],
				'guanli_title'=>'交友相亲',
				'guanli_template'=>'2',
				'guanli_authcode'=>'',
				'guanli_kefu_wechat'=>'',
				'guanli_openid'=>'',
				
			'guanli_key'=>'',
				'guanli_secret'=>'',
				'guanli_sign'=>'',
					'guanli_msgtemplate'=>'',

'guanli_fengmian_marquee'=>'',
									'guanli_share_title'=>'',
				'guanli_share_content'=>'',
				'guanli_share_pic'=>'',


				'guanli_time'=>$_W['timestamp'],
				'guanli_ip'=>$_W['clientip'],
				
			);
pdo_insert('hulu_love_guanli',$nowguanli);
$guanli=pdo_fetch("SELECT * FROM".tablename('hulu_love_guanli')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/guanli');

		}else{






	
		$guanli=pdo_fetch("SELECT * FROM".tablename('hulu_love_guanli')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/guanli');

		}
}
?>