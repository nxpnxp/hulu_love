<?php

global $_W,$_GPC;

if($_GPC['photos_type']=='user_view'){
	$newurl=$this->createWebUrl('user_view',array('openid'=>$_GPC['openid']));
}if($_GPC['photos_type']=='photos'){
		$newurl=$this->createWebUrl('photos');

}else{}

if(!empty($_GPC['pic_id'])){

	$photos=pdo_fetch("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid AND pic_id=:pic_id",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid'],':pic_id'=>$_GPC['pic_id']));
	if(!empty($photos)){

		if($photos['uniacid']==$_W['uniacid']){

			$res=pdo_update('hulu_love_photos',array('pic_pid'=>$_GPC['pic_pid']),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid'],'pic_id'=>$_GPC['pic_id']));

	


			if(!empty($res)){

						//
			if($_GPC['pic_pid']=='3'){
				$talkdata=array(
						'uniacid'=>$_W['uniacid'],
			'talk_pid'=>'3',
			'talk_did'=>'1',
			'openid'=>$_GPC['openid'],
			'talk_content'=>'今天心情真好，我又来晒照片啦！',
			'talk_pic1'=>$photos['pic_url'],
			
			'talk_view'=>'0',
			'talk_time'=>$_W['timestamp'],
			'talk_ip'=>$_W['clientip'],
			'talk_container'=>$_W['container'],
			'talk_os'=>$_W['os'],
					);
pdo_insert('hulu_love_talk',$talkdata);
			}

				message('恭喜，修改成功！',$newurl,'success');
			}else{
				message('抱歉，修改失败！',$newurl,'error');
			}


		}else{

			message('你无权修改此照片信息！',$newurl,'error');
		}
	}else{
		message('该照片信息不存在！',$newurl,'error');
	
	}

}else{
	message('请勿提交非法网址！',$newurl,'error');
}


?>