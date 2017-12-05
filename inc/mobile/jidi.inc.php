<?php

global $_W;
include 'function.php';
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
if (true) {
    $active = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_active_jidi') . 'WHERE uniacid=:uniacid ORDER BY active_id DESC', array(':uniacid' => $_W['uniacid']));
    $ads = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_ads') . 'WHERE uniacid=:uniacid AND ads_pid=:ads_pid ORDER BY ads_did ASC', array(':uniacid' => $_W['uniacid'], ':ads_pid' => '1'));
    include $this->template('active_jidi');
} else {
    getwebres();
}