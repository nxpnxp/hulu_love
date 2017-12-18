<?php

global $_W,$_GPC;
include 'function.php';


//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束


//		if(!empty($res)){
//			message('上传成功！',$this->createMobileUrl('photos'),'success');
//		}else{
//			message('上传失败！',$this->createMobileUrl('photos'),'error');
//		}
	
	$id = $_GPC['xxx'];	
	if(!$id){
		message('操作有误！',$this->createMobileUrl('photos'),'error');
	}
		
	$search = pdo_fetch('select * from'.tablename('hulu_love_photos').'where pic_id='.$id);
	if($search){
		@unlink($_W['attachurl'].$search['pic_url']);
		$res = pdo_delete('hulu_love_photos',array(
			'pic_id' => $id
		));
		if(!empty($res)){
			message('删除成功！',$this->createMobileUrl('photos'),'success');
		}else{
			message('删除失败！',$this->createMobileUrl('photos'),'error');
		}
	}else{
		message('查无此图片！',$this->createMobileUrl('photos'),'error');
	}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>