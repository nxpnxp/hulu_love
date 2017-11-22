<?php

global $_W;
include 'function.php';
function getpinglunnum($talkid, $uniacid)
{
    $pinglun = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_pinglun') . 'WHERE uniacid=:uniacid AND talk_id=:talk_id', array(':uniacid' => $uniacid, ':talk_id' => $talkid));
    return count($pinglun);
}
function getzannum($talkid, $uniacid)
{
    $zan = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_zan') . 'WHERE uniacid=:uniacid AND talk_id=:talk_id', array(':uniacid' => $uniacid, ':talk_id' => $talkid));
    return count($zan);
}
function getzanuser($talkid, $uniacid)
{
    $zan = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_zan') . 'WHERE uniacid=:uniacid AND talk_id=:talk_id', array(':uniacid' => $uniacid, ':talk_id' => $talkid));
    foreach ($zan as $key => $zan) {
        $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $zan['openid']));
        $zannickname[] = $user['nickname'];
    }
    return $zannickname;
}
$guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
if (true) {
    $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
    $talk2 = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_talk') . 'WHERE uniacid=:uniacid AND talk_pid=:talk_pid AND talk_did=:talk_did ORDER BY talk_id DESC', array(':uniacid' => $_W['uniacid'], ':talk_pid' => '3', 'talk_did' => '2'));
    $talk1 = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_talk') . 'WHERE uniacid=:uniacid AND talk_pid=:talk_pid AND talk_did=:talk_did ORDER BY talk_id DESC', array(':uniacid' => $_W['uniacid'], ':talk_pid' => '3', 'talk_did' => '1'));
    $moreads1 = pdo_fetch('SELECT * FROM' . tablename('hulu_love_moreads') . 'WHERE uniacid=:uniacid AND moreads_page=:moreads_page', array(':uniacid' => $_W['uniacid'], ':moreads_page' => '1'));
    load()->func('tpl');
    include $this->template('talk');
} else {
    getwebres();
}