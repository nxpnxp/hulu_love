<?php

function getweidunews($newsopenid, $openid, $uniacid)
{
    $weidu = pdo_fetchall('SELECT * FROM' . tablename('hulu_love_news') . 'WHERE uniacid=:uniacid AND news_openid=:news_openid AND openid=:openid AND news_type=:news_type', array(':uniacid' => $uniacid, ':news_openid' => $newsopenid, ':openid' => $openid, ':news_type' => '1'));
    $weidu_num = count($weidu);
    if ($weidu_num > '0') {
        echo '<div class=\'chat_two_c_1_1\'>' . $weidu_num . '</div>';
    }
}
function getupid($upid)
{
    if ($upid == '1') {
        echo '黑名单';
    }
    if ($upid == '2') {
        echo '待审核';
    }
    if ($upid == '3') {
        echo '普通会员';
    }
    if ($upid == '4') {
        echo 'VIP会员';
    }
}
function getwebtitle($uniacid)
{
    $guanli = pdo_fetch('SELECT * FROM' . tablename('hulu_love_guanli') . 'WHERE uniacid=:uniacid', array(':uniacid' => $uniacid));
    return $guanli['guanli_title'];
}
function getage($nowage, $bornyear)
{
    if (!empty($bornyear)) {
        $age = round((time() - $bornyear) / 31536000, 0);
    } else {
        $age = $nowage;
    }
    return $age;
}
function getuserinfo($openid, $uniacid)
{
    $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $openid));
    if ($user['purpose'] == '0') {
        $userpurpose = '交友';
    }
    if ($user['purpose'] == '1') {
        $userpurpose = '交友';
    }
    if ($user['purpose'] == '2') {
        $userpurpose = '相亲';
    }
    if ($user['purpose'] == '3') {
        $userpurpose = '约会';
    }
    if ($user['purpose'] == '4') {
        $userpurpose = '学习';
    }
    if ($user['purpose'] == '5') {
        $userpurpose = '其他';
    }
    if (!empty($user['bornyear'])) {
        $age = round((time() - $user['bornyear']) / 31536000, 0);
    } else {
        $age = $user['age'];
    }
    echo $userpurpose . '/' . $age . '岁-' . $user['height'] . 'CM-' . $user['weight'] . 'KG';
}
function getnickname($openid, $uniacid)
{
    $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $openid));
    return $user['nickname'];
}
function getcityname($cityid, $uniacid)
{
    $city = pdo_fetch('SELECT * FROM' . tablename('hulu_love_city') . 'WHERE uniacid=:uniacid AND city_id=:city_id', array(':uniacid' => $uniacid, ':city_id' => $cityid));
    return $city['city_name'];
}
function getavatar($openid, $uniacid, $attachurl)
{
    $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $openid));
    $fans = pdo_fetch('SELECT * FROM' . tablename('mc_mapping_fans') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $openid));
    $member = pdo_fetch('SELECT * FROM' . tablename('mc_members') . 'WHERE uniacid=:uniacid AND uid=:uid', array(':uniacid' => $uniacid, ':uid' => $fans['uid']));
    if (substr($member['avatar'], 0, 19) == 'http://wx.qlogo.cn/') {
        $avatar = $user['avatar'];
    } else {
        $avatar = $attachurl . $member['avatar'];
    }
    return $avatar;
}
function getuid($openid, $uniacid)
{
    $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $uniacid, ':openid' => $openid));
    return $user['uid'];
}
function getwithdrawpid($withdrawpid)
{
    if ($withdrawpid == '1') {
        return '提现失败';
    }
    if ($withdrawpid == '2') {
        return '处理中';
    }
    if ($withdrawpid == '3') {
        return '提现成功';
    }
}
function getmoneytype($moneytype)
{
    if ($moneytype == '1') {
        return 'VIP收益';
    }
    if ($moneytype == '2') {
        return '查看联系方式';
    }
    if ($moneytype == '3') {
        return '打赏';
    }
    if ($moneytype == '4') {
        return '赠送礼物';
    }
    if ($moneytype == '5') {
        return '注册赠送';
    }
    if ($moneytype == '6') {
        return '推广分享';
    }
    if ($moneytype == '7') {
        return '参与活动';
    }
    if ($moneytype == '8') {
        return '提现';
    }
    if ($moneytype == '9') {
        return '打赏说说';
    }
}
function getactivetype($activetype)
{
    if ($activetype == '1') {
        return '个人发起';
    }
    if ($activetype == '2') {
        return '商家发起';
    }
    if ($activetype == '3') {
        return '官方发起';
    }
}
function getsex($sex)
{
    if ($sex == '1') {
        $usersex = '男';
    }
    if ($sex == '2') {
        $usersex = '女';
    }
    return $usersex;
}
function getpurpose($purpose)
{
    if ($purpose == '0') {
        $userpurpose = '交友';
    }
    if ($purpose == '1') {
        $userpurpose = '交友';
    }
    if ($purpose == '2') {
        $userpurpose = '相亲';
    }
    if ($purpose == '3') {
        $userpurpose = '约会';
    }
    if ($purpose == '4') {
        $userpurpose = '学习';
    }
    if ($purpose == '5') {
        $userpurpose = '其他';
    }
    return $userpurpose;
}
function getfeeling($feeling)
{
    if ($feeling == '1') {
        $userfeeling = '单身中';
    }
    if ($feeling == '2') {
        $userfeeling = '约会中';
    }
    if ($feeling == '3') {
        $userfeeling = '交往中';
    }
    return $userfeeling;
}
function getmarried($married)
{
    if ($married == '1') {
        $usermarried = '未婚';
    }
    if ($married == '2') {
        $usermarried = '已婚';
    }
    if ($married == '3') {
        $usermarried = '离异';
    }
    if ($married == '4') {
        $usermarried = '丧偶';
    }
    return $usermarried;
}
function gettimegap($beforetime)
{
    $gaptime = time() - $beforetime;
    if ($gaptime < '60') {
        return $gaptime . '秒前';
    }
    if ($gaptime >= '60' && $gaptime < '3600') {
        return floor($gaptime / 60) . '分钟前';
    }
    if ($gaptime >= '3600' && $gaptime < '86400') {
        return floor($gaptime / 3600) . '小时前';
    }
    if ($gaptime >= '86400' && $gaptime < '2592000') {
        return floor($gaptime / 86400) . '天前';
    }
    if ($gaptime >= '2592000' && $gaptime < '31536000') {
        return floor($gaptime / 2592000) . '月前';
    }
    if ($gaptime >= '31536000') {
        return date('Y-m-d', $logintime);
    }
}
function getgiftpic($giftid, $uniacid, $attach)
{
    $gift = pdo_fetch('SELECT * FROM' . tablename('hulu_love_gift') . 'WHERE uniacid=:uniacid AND gift_id=:gift_id', array(':uniacid' => $uniacid, ':gift_id' => $giftid));
    return $attach . $gift['gift_pic'];
}
function getgiftname($giftid, $uniacid)
{
    $gift = pdo_fetch('SELECT * FROM' . tablename('hulu_love_gift') . 'WHERE uniacid=:uniacid AND gift_id=:gift_id', array(':uniacid' => $uniacid, ':gift_id' => $giftid));
    return $gift['gift_name'];
}
function getsalary($salary)
{
    if ($salary == '1') {
        echo '我不在乎对方薪资';
    }
    if ($salary == '2') {
        echo '1K以下';
    }
    if ($salary == '3') {
        echo '1K-2K元';
    }
    if ($salary == '4') {
        echo '2K-3K元';
    }
    if ($salary == '5') {
        echo '3K-4K元';
    }
    if ($salary == '6') {
        echo '4K-5K元';
    }
    if ($salary == '7') {
        echo '5K-6K元';
    }
    if ($salary == '8') {
        echo '6K-7K元';
    }
    if ($salary == '9') {
        echo '7K-8K元';
    }
    if ($salary == '10') {
        echo '8K-9K元';
    }
    if ($salary == '11') {
        echo '9K-10K元';
    }
    if ($salary == '12') {
        echo '10K-15K元';
    }
    if ($salary == '13') {
        echo '15K-20K元';
    }
    if ($salary == '14') {
        echo '20K元以上';
    }
}
function geteducation($education)
{
    if ($education == '1') {
        echo '我不在乎对方学历';
    }
    if ($education == '2') {
        echo '博士后';
    }
    if ($education == '3') {
        echo '博士';
    }
    if ($education == '4') {
        echo '硕士';
    }
    if ($education == '5') {
        echo '研究生';
    }
    if ($education == '6') {
        echo '大学本科';
    }
    if ($education == '7') {
        echo '大专';
    }
    if ($education == '8') {
        echo '高中';
    }
    if ($education == '9') {
        echo '中专';
    }
    if ($education == '10') {
        echo '初中';
    }
    if ($education == '11') {
        echo '小学';
    }
}
function getarea($area)
{
    if ($area == '1') {
        echo '我不在乎对方距离';
    }
    if ($area == '2') {
        echo '同一乡镇';
    }
    if ($area == '3') {
        echo '同一县城';
    }
    if ($area == '4') {
        echo '同一市区';
    }
    if ($area == '5') {
        echo '同一省份';
    }
    if ($area == '6') {
        echo '同一国家';
    }
    if ($area == '7') {
        echo '同一星球';
    }
}
function getwebsite($a, $e)
{
    $a = $a;
    $b = $_SERVER['HTTP_HOST'];
    $c = gethostbyname($_SERVER['SERVER_ADDR']);
    $d = 'hulujiaoyou@!.';
    $e = $e;
    $f = date('Y', time());
    $res = sha1(md5(sha1(md5($a)) . sha1(md5($b)) . sha1(md5($c)) . sha1(md5($d)) . sha1(md5($e)) . sha1(md5($f))));
    return $res;
}
function getwebres()
{
    return message('没有授权或授权期限已过！请联系客服进行授权', '', 'error');
}