<?php


global $_W,$_GPC;
//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束


if($_W['isajax']){

	$oldzan=pdo_fetchall("SELECT * FROM".tablename('hulu_love_zan')."WHERE uniacid=:uniacid AND talk_id=:talk_id AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id'],'openid'=>$_W['openid']));
if(empty($oldzan)){
		$zan=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'talk_id'=>$_GPC['talk_id'],
						'zan_time'=>$_W['timestamp'],
			'zan_ip'=>$_W['clientip'],
			'zan_container'=>$_W['container'],
			'zan_os'=>$_W['os'],

			);
			$res=pdo_insert('hulu_love_zan',$zan);
if(!empty($res)){

	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));
echo '，',$user['nickname'];

	//message('恭喜，评论成功！',$this->createMobileUrl('talk_view',array('talk_id'=>$_GPC['talk_id'])),'success');
	//echo'点赞成功';
}else{
		//message('抱歉，评论失败！',$this->createMobileUrl('talk_view',array('talk_id'=>$_GPC['talk_id'])),'error');
		//echo'点赞失败';

}
}else{
	//echo'你已赞过！';
}
}else{}

//echo $_W['timestamp'];


//判断尾部开始
	}else{ //echo'请先关注';
	}
}else{ //echo'请在微信打开';
}
//判断尾部结束

?>