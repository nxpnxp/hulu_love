<?php

global $_W,$_GPC;


include 'function.php';



$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$talk=pdo_fetch("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND talk_id=:talk_id",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id']));

if($_GPC['talk_id']&&$talk['talk_pid']=='3'){


$pinglun=pdo_fetchall("SELECT * FROM".tablename('hulu_love_pinglun')."WHERE uniacid=:uniacid AND talk_id=:talk_id ORDER BY pinglun_id DESC",array(':uniacid'=>$_W['uniacid'],':talk_id'=>$_GPC['talk_id']));

include $this->template('talk_view');

}else{
message('抱歉！该说说不存在或已被屏蔽！',$this->createMobileUrl('talk'),'error');
}
?>