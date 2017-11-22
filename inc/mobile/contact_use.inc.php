<?php

global $_W,$_GPC;

$contactdata=array(
'uniacid'=>$_W['uniacid'],
'openid'=>$_GPC['openid'],
'contact_openid'=>$_W['openid'],
'contact_price'=>'0.00',
'contact_time'=>$_W['timestamp'],
'contact_ip'=>$_W['clientip'],
'contact_container'=>$_W['container'],
'contact_os'=>$_W['os'],

);

pdo_insert('hulu_love_contact',$contactdata);
?>