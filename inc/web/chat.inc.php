<?php

global $_W;

include 'function.php';
$chat=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid ORDER BY news_id DESC",array(':uniacid'=>$_W['uniacid']));

$chat1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND news_pid=:news_pid ORDER BY news_id DESC",array(':uniacid'=>$_W['uniacid'],':news_pid'=>'1'));

$chat2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND news_pid=:news_pid ORDER BY news_id DESC",array(':uniacid'=>$_W['uniacid'],':news_pid'=>'2'));


include $this->template('web/chat');

?>