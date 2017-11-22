<?php
global $_W,$_GPC;
if($_W['container']=='wechat'){
if($_W['fans']['follow']=='1'){
	$now=pdo_fetchall("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
	if(!empty($now)){

		include 'm_function.php';
$m_list=array(
array('url'=>'m_user','title'=>'会员','pic'=>'1.png'),
array('url'=>'m_pic','title'=>'照片','pic'=>'2.png'),
array('url'=>'m_talk','title'=>'动态','pic'=>'3.png'),
array('url'=>'m_active','title'=>'活动','pic'=>'4.png'),
);
$admin=pdo_fetch("SELECT * FROM".tablename('hulu_love_admin')."WHERE uniacid=:uniacid AND admin_did=:admin_did",array(':uniacid'=>$_W['uniacid'],':admin_did'=>'2'));

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


if (isset($_COOKIE["admin_user"])&&($_COOKIE["admin_user"]=='hulu_love')){

}else{




load()->classs('weixin.account');
$accObj= WeixinAccount::create($_W['uniacid']);


$touser=$admin['openid'];
$tpl_short_id='JGNbzeL_qSvljkl_PbviyKjuPl4p_qIAU3uvt2al_YE';
$postdata=array(
'first'=>array('value'=>'亲爱的总管理员，管理员正在通过手机端管理站点！','color'=>'#000',),
'keyword1'=>array('value'=>$user['nickname'],'color'=>'#0000FF',),
'keyword2'=>array('value'=>date('Y-m-d H:i:s',$_W['timestamp']),'color'=>'#0000FF',),
'remark'=>array('value'=>"\n\t请核实管理员身份，注意账号安全！24小时之内该管理员再次登录将不再提醒！",'color'=>'#FF0000',),
);
$url=$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=m_home&m=hulu_love';
$topcolor='#FC5488';
$accObj->sendTplNotice($touser,$tpl_short_id,$postdata,$url,$topcolor);

		setcookie("admin_user","hulu_love",time()+86400);

}
include $this->template('m/m_home');

		}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');		}
	}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');	}
}else{	message('正在跳转至首页！',$this->createMobileUrl('fengmian'),'success');}
?>