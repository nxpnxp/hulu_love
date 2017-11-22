<?php


global $_W,$_GPC;

load()->classs('weixin.account');
$accObj= WeixinAccount::create($_W['uniacid']);

if($_GPC['do']=='active'){

$notice=pdo_fetch("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
$touser=$order['order_openid'];
$tpl_id_short=$notice['notice_active_num'];


		$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$order['order_openid']));

		$join=pdo_fetch("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND join_id=:join_id",array(':uniacid'=>$_W['uniacid'],':join_id'=>$order['order_seven']));

			$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$_W['uniacid'],':activeid'=>$join['active_id']));

$postdata=array(

'first'=>array('value'=>'你好，'.$user['nickname'],'color'=>'#000',),
'keyword1'=>array('value'=>$active['active_title'],'color'=>'#000',),
'keyword2'=>array('value'=>date('Y-m-d H:i:s',$active['active_starttime']),'color'=>'#000',),
'keynote3'=>array('value'=>$active['active_address'],'color'=>'#000',),
'remark'=>array('value'=>"\n\t活动报名成功！等待活动开始！\n\t".$notice['notice_ads'],'color'=>'#000',),
);



$url=$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=active&m=hulu_love';
$topcolor='#0098F0';
$accObj->sendTplNotice($touser,$tpl_id_short,$postdata,$url,$topcolor);


}elseif($_GPC['do']=='my'){


$notice=pdo_fetch("SELECT * FROM".tablename('hulu_love_tplnotice')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));
$touser=$_W['openid'];
$tpl_id_short=$notice['notice_reg_num'];

$postdata=array(

'first'=>array('value'=>'你好，“'.$_W['fans']['nickname'].'”，你已注册成功！','color'=>'#000',),
'keyword1'=>array('value'=>$_W['fans']['nickname'],'color'=>'#000',),
'keyword2'=>array('value'=>date('Y-m-d H:i:s',$_W['timestamp']),'color'=>'#000',),
'remark'=>array('value'=>"\n\t你已注册成功！等待审核之后即可显示！聊天交友时请遵守法律法规！\n\t".$notice['notice_ads'],'color'=>'#0098f0',),
);



$url=$_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&do=my&m=hulu_love';
$topcolor='#0098F0';
$accObj->sendTplNotice($touser,$tpl_id_short,$postdata,$url,$topcolor);

}


else{}

?>