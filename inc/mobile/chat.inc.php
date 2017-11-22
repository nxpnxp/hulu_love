<?php

global $_W;
include 'function.php';
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
if (true) {
    $chat = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_news') . 'WHERE uniacid=:uniacid AND news_openid=:news_openid ORDER BY news_id DESC', array(':uniacid' => $_W['uniacid'], ':news_openid' => $_W['openid']));
    include $this->template('chat_top');
    $name = array();
    foreach ($chat as $key => $chat) {
        if (!in_array($chat['openid'], $name)) {
            $name[] = $chat['openid'];
            include $this->template('chat_list');
        }
    }
    include $this->template('chat_bottom');
} else {
    getwebres();
}