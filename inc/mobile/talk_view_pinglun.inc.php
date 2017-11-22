<?php


global $_W,$_GPC;

//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){
	if(checksubmit('submit')){
		$pinglun=array(
			'uniacid'=>$_W['uniacid'],
			'openid'=>$_W['openid'],
			'pinglun_pid'=>'2',
			'talk_id'=>$_GPC['talk_id'],
			'pinglun_content'=>$_GPC['pinglun_content'],
						'pinglun_time'=>$_W['timestamp'],
			'pinglun_ip'=>$_W['clientip'],
			'pinglun_container'=>$_W['container'],
			'pinglun_os'=>$_W['os'],

			);
			$res=pdo_insert('hulu_love_pinglun',$pinglun);
if(!empty($res)){
	message('恭喜，评论成功！',$this->createMobileUrl('talk_view',array('talk_id'=>$_GPC['talk_id'])),'success');
}else{
		message('抱歉，评论失败！',$this->createMobileUrl('talk_view',array('talk_id'=>$_GPC['talk_id'])),'error');

}

}else{}
}else{}

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束

?>