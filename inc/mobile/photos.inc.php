<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){
	if(checksubmit('submit')){

	$datadata=$_POST['pic_url'];
		//exit;

		foreach($datadata as $key=>$datadata){
		$picdata=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'pic_pid'=>'2',
			'pic_name'=>'',
			'pic_url'=>$datadata,
			'pic_time'=>$_W['timestamp'],
			'pic_ip'=>$_W['clientip'],
			'pic_container'=>$_W['container'],
			'pic_os'=>$_W['os'],
			);
		
		$res=pdo_insert('hulu_love_photos',$picdata);
		}
		if(!empty($res)){
			message('上传成功！',$this->createMobileUrl('photos'),'success');
		}else{
			message('上传失败！',$this->createMobileUrl('photos'),'error');
		}
		
	}


}else{
load()->func('tpl');

$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

include $this->template('photos');
}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>