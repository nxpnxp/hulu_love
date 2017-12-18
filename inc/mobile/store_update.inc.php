<?php

global $_W,$_GPC;







if(!empty($_GPC['store_openid'])){
$id = $_GPC['store_id'];
	$newstore=array(
		'store_pid'=>'1',
		'openid'=>$_W['openid'],
		'store_openid'=>$_GPC['store_openid'],
		'gift_id'=>$_GPC['gift_id'],
		'uniacid'=>$_W['uniacid'],
				//'store_time'=>$_W['timestamp'],
					//	'store_ip'=>$_W['clientip'],
				//'store_container'=>$_W['container'],
				//'store_os'=>$_W['os'],		
		);
$res = pdo_insert('hulu_love_store', $newstore);
pdo_delete('hulu_love_store', array('store_id' => $id));

//$res=pdo_update('hulu_love_store',$newstore,array('uniacid'=>$_W['uniacid'],'store_id'=>$_GPC['store_id'],'openid'=>$_W['openid']));

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['store_openid']));
$uid=$user['uid'];
if(!empty($res)){
	
	$my = pdo_fetch("select * from ".tablename('hulu_love_user')." WHERE uniacid={$_W['uniacid']} and openid = '{$_W['openid']}'");
    
	$data=array(
	"touser"=>$_GPC['store_openid'],
	"msgtype"=>"news",
	"news"=>array(
	"articles"=>array(
	array(
	"title"=>$my['nickname']."送了您一份礼物！",
	"description"=>"收到新礼物，快去看看谁送的！",
	"url"=>$_W['siteroot'].substr($this->createMobileUrl('view',array('uid'=>$my['uid'])),2),
	//"picurl"=>"http://wx.asapp.cn/addons/jy_ppp/images/notice.jpg",
	),
	),
	),
	);
load()->classs('weixin.account');
$accObj= WeixinAccount::create($_W['uniacid']);
$access_token = $accObj->fetch_token();

   
$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;

$data = json_encode($data, JSON_UNESCAPED_UNICODE);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
if (!empty($data)) {
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
	
	message('赠送成功！',$this->createMobileUrl('view',array('uid'=>$uid)),'success');

}else{

		message('赠送失败！',$this->createMobileUrl('store',array('store_openid'=>$_GPC['store_openid'])),'error');


}

}else{

			message('请选择一个小伙伴才能赠送！',$this->createMobileUrl('store'),'error');


}
?>