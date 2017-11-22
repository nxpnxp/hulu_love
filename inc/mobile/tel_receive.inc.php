<?php


global $_W,$_GPC;
include 'function.php';

$guanli=pdo_fetch("SELECT * FROM".tablename('hulu_love_guanli')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));


$appkey=$guanli['guanli_key'];
$secret=$guanli['guanli_secret'];
$sign=$guanli['guanli_sign'];
$msgtemplate=$guanli['guanli_msgtemplate'];
$tel=$_GPC['more_real_tel_num'];
$name='会员';

$authcode=$_GPC['authcode'];

include 'msg/TopSdk.php';



$c = new TopClient;
$c ->appkey = $appkey ;
$c ->secretKey = $secret ;
$req = new AlibabaAliqinFcSmsNumSendRequest;
$req ->setExtend( "123456" );
$req ->setSmsType( "normal" );
$req ->setSmsFreeSignName( "$sign" );
$req ->setSmsParam( "{name:'$name',authcode:'$authcode'}" );
$req ->setRecNum("$tel");
$req ->setSmsTemplateCode( "$msgtemplate" );
$resp = $c ->execute( $req );
 

 
		$teldata=array(
'more_real_tel_num'=>$tel,
			'more_real_tel_authcode'=>$authcode,
	);		
		
$res=pdo_update('hulu_love_more',$teldata,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

?>