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

			$res=pdo_delete('hulu_love_photos',array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['openid'],'pic_id'=>$_GPC['pic_id']));

			load()->func('file');
file_delete($photos['pic_url']);

			if(!empty($res)){
				message('恭喜，删除成功！',$newurl,'success');
			}else{
				message('抱歉，删除失败！',$newurl,'error');
			}


		}else{

			message('你无权删除此照片信息！',$newurl,'error');
		}
	}else{
		message('该照片信息不存在！',$newurl,'error');
	
	}

}else{
	message('请勿提交非法网址！',$newurl,'error');
}


?>