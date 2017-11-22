<?php

global $_W,$_GPC;

$openid=$_W['openid'];



$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));



$data=array(
"touser"=>'oWkedt38wEDlHRR0dKFmyQVJHqjA',
"msgtype"=>"news",
"news"=>array(
"articles"=>array(
array(
"title"=>"附近的“".$user['nickname']."”给你发了新消息！",
"description"=>"Ta给你发了新消息，赶快回复Ta吧！",
"url"=>$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=chat&m=hulu_love',
"picurl"=>"http://wx.asapp.cn/addons/jy_ppp/images/notice.jpg",
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
       
 



?>