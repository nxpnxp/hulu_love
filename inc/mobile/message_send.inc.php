<?php

global $_W,$_GPC;

//include 'function.php';


//if(!empty($_GPC['news_content'])){
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

var_dump($newsdata);

//echo'123';
//}
?>