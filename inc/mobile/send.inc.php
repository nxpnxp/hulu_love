<?php

global $_W,$_GPC;

include 'function.php';

if(!empty($_GPC['news_content'])){
$newsdata=array(
'uniacid'=>$_W['uniacid'],
'news_pid'=>'1',
'news_type'=>'1',
'openid'=>$_W['openid'],
'news_content'=>$_GPC['news_content'],
'news_openid'=>$_GPC['news_openid'],
'news_time'=>$_W['timestamp'],
'news_ip'=>$_W['clientip'],
'news_container'=>$_W['container'],
'news_os'=>$_W['os'],

);
pdo_insert('hulu_love_news',$newsdata);


$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$ta=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['news_openid']));


$notice=pdo_fetch("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

//未读
$weidu=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND news_openid=:news_openid AND news_type=:news_type",array(':uniacid'=>$_W['uniacid'],':news_openid'=>$_GPC['news_openid'],':news_type'=>'1'));
$weidu_num=count($weidu);
$chat=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_openid=:news_openid ORDER BY news_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid'],':news_openid'=>$_GPC['news_openid']));


if((($_W['timestamp'])-($chat[0]['news_time']))>=($notice['notice_news_timegap']*'3600')){
	

load()->classs('weixin.account');
$accObj= WeixinAccount::create($_W['uniacid']);
$touser=$_GPC['news_openid'];
$tpl_id_short=$notice['notice_news_num'];
$postdata=array(
'first'=>array('value'=>'你好，'.$ta['nickname'],color=>'#000',),
'keyword1'=>array('value'=>$weidu_num.'条',color=>'red',),
'keyword2'=>array('value'=>$user['nickname'],color=>'#ddd',),
'keyword3'=>array('value'=>date('Y-m-d H:i:s',$_W['timestamp']),color=>'#999',),
'remark'=>array('value'=>"\n\t你的小伙伴".$user['nickname']."对你说：“".$_GPC['news_content']."”。\n\t".$notice['notice_ads'],color=>'#0098F0',),

);
$url=$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=chat&m=hulu_love';
$topcolor='#0098F0';
$accObj->sendTplNotice($touser,$tpl_id_short,$postdata,$url,$topcolor);
}
//include 'notice.inc.php';
//==================================================================================================================



$data=array(
"touser"=>$_GPC['news_openid'],
"msgtype"=>"news",
"news"=>array(
"articles"=>array(
array(
"title"=>"附近的“".$user['nickname']."”给你发了新消息！",
"description"=>"Ta对你说：“".$_GPC['news_content']."”。赶快回复Ta吧！",
"url"=>$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=chat&m=hulu_love',
	"picurl"=>$_W['siteroot']."/addons/hulu_love/public/images/news.png",
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
       
 
//==================================================================================================================
}
?>