<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){

	if(checksubmit('submit')){

		$talkdata=array(
			'uniacid'=>$_W['uniacid'],
			'talk_pid'=>'2',
			'talk_did'=>'1',
			'openid'=>$_W['openid'],
			'talk_content'=>$_GPC['talk_content'],
			'talk_pic1'=>$_GPC['talk_pic1'],
			'talk_pic2'=>$_GPC['talk_pic2'],
			'talk_pic3'=>$_GPC['talk_pic3'],
			'talk_view'=>'0',
			'talk_time'=>$_W['timestamp'],
			'talk_ip'=>$_W['clientip'],
			'talk_container'=>$_W['container'],
			'talk_os'=>$_W['os'],
			
		);

			$res=pdo_insert('hulu_love_talk',$talkdata);
		if(!empty($res)){
			message('发布成功！审核之后即可在同城圈展示！',$this->createMobileUrl('talk'),'success');
		}else{
			message('抱歉！发布失败！请重试...',$this->createMobileUrl('talk_add'),'error');
		}
	
	}
}

else{
include $this->template('talk_add');
}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>