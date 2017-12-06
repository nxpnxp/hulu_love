<?php

global $_W,$_GPC;
include 'function.php';

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

	//判断是否可添加活动权限 
	$search = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid and openid=:openid', array(':uniacid' => $_W['uniacid'],':openid'=>$_W['openid']));
	if(!$search['isadd']){
		message('抱歉！您没有权限。',$this->createMobileUrl('home'),'error');die;
	}
	
if($_W['ispost']){

	if(checksubmit('submit')){
		if (is_uploaded_file($_FILES["thumb"][tmp_name])) {
		  $uptypes=array(  
			'image/jpg',  
			'image/jpeg',  
			'image/png',  
			'image/pjpeg',  
			'image/gif',  
			'image/bmp',  
			'image/x-png'  
		  );  
		  $destination_folder="./attachment/";
		  $file = $_FILES["thumb"];  
		  if(4000000 < $file["size"])  
		  //检查文件大小  
		  {  
			  message('图片不能超过4m'); 
		  }  
		  if(!in_array($file["type"], $uptypes))  
		  //检查文件类型  
		  {  
			  message('文件类型不正确');   
		  }  
		  if(!is_dir($destination_folder))  
	      {  
	        mkdir($destination_folder); 
			//message('上传路径不存在');  
	     }  
		$filename=$file["tmp_name"];  
	    $pinfo=pathinfo($file["name"]);  
	    $ftype=$pinfo['extension'];  
	    $destination = $destination_folder.time().".".$ftype;  
	    if (file_exists($destination))  
	    {  
	        message('同名文件已经存在');
	    }  
	  
	    if(!move_uploaded_file ($filename, $destination))  
	    {  
	        echo "移动文件出错";  
	        exit;  
	    }  
		$thumb = '/app/attachment/'.time().".".$ftype; 
		}
		
		$activedata=array(
			'uniacid'=>$_W['uniacid'],
			'active_pid'=>'3',
			'openid'=>$_W['openid'],
			'active_title'=>$_GPC['active_title'],
			'active_type'=>$_GPC['active_type'],
			'active_boy'=>$_GPC['active_boy'],
			'active_girl'=>$_GPC['active_girl'],
			'active_money'=>$_GPC['active_money'],
			'active_address'=>$_GPC['active_address'],
			'active_starttime'=>strtotime($_GPC['active_starttime']),
			'active_endtime'=>strtotime($_GPC['active_endtime']),
			'active_tel'=>$_GPC['active_tel'],
			'active_content'=>$_GPC['active_content'],
			'active_time'=>$_W['timestamp'],
			'active_ip'=>$_W['clientip'],
			'active_container'=>$_W['container'],
			'active_os'=>$_W['os'],
			'image'=>$thumb,
			);

		$res=pdo_insert('hulu_love_active',$activedata);
		if(!empty($res)){
			message('恭喜！添加成功！请等待审核成功之后即可显示...',$this->createMobileUrl('active'),'success');
		}else{
			message('抱歉！添加失败！请重试...',$this->createMobileUrl('active_add'),'error');
		}
	
	}

}else{
include $this->template('active_add');

}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>