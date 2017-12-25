<?php
namespace Aliyun\DySDKLite\Sms;
require './SignatureHelper.php';
use Aliyun\DySDKLite\SignatureHelper;
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

//include 'msg/TopSdk.php';
/*$c = new TopClient;
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
var_dump($resp);exit;*/

/*echo 222;exit;
$demo = new SmsDemo(
		"LTAI87mFtsD0Vx4S",
		"01XkGELfylr4ywJiSSWdRXityKkJc6"
		);
$response = $demo->sendSms(
"张星华5566", // 短信签名
"SMS_86660147", // 短信模板编号
"15822422406", // 短信接收者
Array(  // 短信模板中字段的值
	"name"=>"12345",
	//"product"=>"dsd"
),
"123"
);

var_dump($demo);*/
//print_r($response);

 
/**
 * 发送短信
 */


    $params = array ();

    // *** 需用户填写部分 ***

    // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    $accessKeyId = $appkey;
    $accessKeySecret = $secret;

    // fixme 必填: 短信接收号码
    $params["PhoneNumbers"] = $tel;

    // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
    $params["SignName"] = $sign;

    // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
    $params["TemplateCode"] = $msgtemplate;

    // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
	
    $params['TemplateParam'] = Array (
       // "code" => "12345",
        //"product" => "阿里通信"
		"code"=>$authcode,
    );

    // fixme 可选: 设置发送短信流水号
    $params['OutId'] = "12345";

    // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
    $params['SmsUpExtendCode'] = "1234567";


    // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
    if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
        $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
    }
    
    // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
    $helper = new SignatureHelper();

    // 此处可能会抛出异常，注意catch
    $content = $helper->request(
        $accessKeyId,
        $accessKeySecret,
        "dysmsapi.aliyuncs.com",
        array_merge($params, array(
            "RegionId" => "cn-hangzhou",
            "Action" => "SendSms",
            "Version" => "2017-05-25",
        ))
    );


 


$teldata=array(
	'more_real_tel_num'=>$tel,
	'more_real_tel_authcode'=>$authcode,
);		

		
$res=pdo_update('hulu_love_more',$teldata,array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid']));

?>