<?php

global $_W,$_GPC;
include 'function.php';

//include "../../../../wechat/include.php";
include "../wechat/include.php";
function & load_wechat($type = '') {
    static $wechat = array();
    $index = md5(strtolower($type));
    if (!isset($wechat[$index])) {
       $options = array(
            'token'           => 'fppPLNZ9B9b3LlprPwLbWnCpRpPZpP4W', // 填写你设定的key
            'appid'           => 'wxaae12993a4d3e5f8', // 填写高级调用功能的app id, 请在微信开发模式后台查询
            'appsecret'       => '41eb26b86e3ada2e2047e8fb5c97f805', // 填写高级调用功能的密钥
            'encodingaeskey'  => 'uiIt1qhM5zCT0etTQrtHq9R1LHNhCJ85QQqi4HQEHCC', // 填写加密用的EncodingAESKey（可选，接口传输选择加密时必需）
            //'mch_id'          => '10018861', // 微信支付，商户ID（可选）
            //'partnerkey'      => 'vipin521vipin521vipin521vipin905', // 微信支付，密钥（可选）
            //'ssl_cer' => './wechat/cert/apiclient_cert.pem',
            //'ssl_key' => './wechat/cert/apiclient_key.pem',
            'cachepath'       => '', // 设置SDK缓存目录（可选，默认位置在Wechat/Cache下，请保证写权限）
        	
        );
        \Wechat\Loader::config($options);
        $wechat[$index] = \Wechat\Loader::get($type);
    }
    return $wechat[$index];
}

//curl
function _request($url, $https=true, $method='get', $data=null){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url); //设置URL
	curl_setopt($ch,CURLOPT_HEADER,false); //不返回网页URL的头信息
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出返回一个字符串
	if($https){
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//服务器端的证书不验证
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//客户端证书不验证
	}
	if($method == 'post'){
		curl_setopt($ch, CURLOPT_POST, true); //设置为POST提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置提交数据$data
	}
	$str = curl_exec($ch);//执行访问
	curl_close($ch);//关闭curl释放资源
	return $str;
}

//获取token
function getToken(){
	$_appid = 'wxaae12993a4d3e5f8';
	$_secret = '41eb26b86e3ada2e2047e8fb5c97f805';
	$_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$_appid&secret=$_secret";
	$file = "./accesstoken.txt";
	$str = _request($_url);
	file_put_contents($file,$str);
	$obj = json_decode($str);
	return $obj->access_token; 
}

//下载多媒体文件
function downMedia($mediaId,$uniacid){
	$_token = getToken();
	$_url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$_token&media_id=$mediaId";
    $fileInfo = downloadWeixinFile($_url);
	
	$_dir = 'images/'.$uniacid.'/'.date("Y",time()).'/'.date("m",time());
	if(!file_exists('../attachment/'.$_dir)){
		mkdir('../attachment/'.$_dir);
	}
	$filename = $_dir.'/'.rand(1,100000).time().'.jpg';
	saveWeixinFile('../attachment/'.$filename,$fileInfo['body']);
	return $filename;
}

function downloadWeixinFile($url){
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_NOBODY,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$package = curl_exec($ch);
	$httpinfo = curl_getinfo($ch);
	curl_close($ch);
	$imageAll = array_merge(array('header'=>$httpinfo),array('body'=>$package));
	return $imageAll;
}

function saveWeixinFile($filename,$filecontent){
	$local_file = fopen($filename,'w');
	if(false !==$local_file){
		if(false != fwrite($local_file,$filecontent)){
			fclose($local_file);
		}
	}
}


//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

if($_W['ispost']){
	//if(checksubmit('submit')){

	$datadata = $_GPC['srcs'];
	$datadata = str_replace('&quot;', '"', $datadata);
	$datadata = json_decode($datadata);	
	//exit;

		foreach($datadata as $key=>$datadata){
			$imgurl = downMedia($datadata,$_W['uniacid']);
			$picdata=array(
				'uniacid'=>$_W['uniacid'],
				'openid'=>$_W['openid'],
				//'pic_pid'=>'2',//待审核
				'pic_pid'=>'3',//已审核
				'pic_name'=>'',
				'pic_url'=>$imgurl,
				'pic_time'=>$_W['timestamp'],
				'pic_ip'=>$_W['clientip'],
				'pic_container'=>$_W['container'],
				'pic_os'=>$_W['os'],
			);
		
			$res=pdo_insert('hulu_love_photos',$picdata);
		}
		echo '上传成功，请等待审核！';
//		if(!empty($res)){
//			message('上传成功！',$this->createMobileUrl('photos'),'success');
//		}else{
//			message('上传失败！',$this->createMobileUrl('photos'),'error');
//		}
		
	//}


}else{
load()->func('tpl');

$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid and pic_pid=3 ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


	$script = &load_wechat('Script');
	$thisurl = $_W['siteurl'];
	$options = $script->getJsSign($thisurl);
	$options = json_encode($options);
				
	if($options===FALSE){
	    echo $script->errMsg;die;
	}

include $this->template('photos');
}


//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
?>