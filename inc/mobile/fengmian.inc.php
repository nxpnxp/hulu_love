<?php

global $_W;
include 'function.php';
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
$ads = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_ads') . 'WHERE uniacid=:uniacid AND ads_pid=:ads_pid ORDER BY ads_did ASC', array(':uniacid' => $_W['uniacid'], ':ads_pid' => '1'));
if (true) {
    $user = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND upid=3 or upid=4 ORDER BY uid DESC', array(':uniacid' => $_W['uniacid']));
    if ($guanli['guanli_template'] == '1') {
        $nowuser = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
        $user_sex = isset($nowuser['sex']) ? $nowuser['sex'] : $_W['fans']['tag']['sex'];
        if ($user_sex == '1') {
            $user = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND sex=:sex AND upid!=1&&upid!=2 ORDER BY uid DESC', array(':uniacid' => $_W['uniacid'], ':sex' => '2'));
        } elseif ($user_sex == '2') {
            $user = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND sex=:sex AND upid!=1&&upid!=2 ORDER BY uid DESC', array(':uniacid' => $_W['uniacid'], ':sex' => '1'));
        } elseif ($user_sex == '0') {
            $user = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND upid=3 or upid=4 ORDER BY uid DESC', array(':uniacid' => $_W['uniacid']));
        } else {
        }
        include $this->template('fengmian');
    } elseif ($guanli['guanli_template'] == '2') {
        include $this->template('home');
    } else {
		include $this->template('fengmian');
    }
} else {
    getwebres();
}