<?php
 
defined('IN_IA') or die('Access Denied');
class Hulu_loveModuleSite extends WeModuleSite
{
    public function doMobileFengmian1()
    {
    }
    public function doWebGuize()
    {
    }
    public function doWebGuanli1()
    {
    }
    public function doMobileShouye()
    {
    }
    public function doMobileGeren()
    {
    }
    public function doMobileKuaijie()
    {
    }
    public function payResult($params)
    {
        global $_W;
        if ($params['result'] == 'success' && $params['from'] == 'notify') {
            pdo_update('hulu_love_order', array('order_pid' => '2', 'order_endtime' => $_W['timestamp']), array('uniacid' => $_W['uniacid'], 'order_num' => $params['tid']));
            $order = pdo_fetch('SELECT * FROM' . tablename('hulu_love_order') . 'WHERE uniacid=:uniacid AND order_num=:order_num', array(':uniacid' => $_W['uniacid'], ':order_num' => $params['tid']));
            $make = pdo_fetch('SELECT * FROM' . tablename('hulu_love_make') . 'WHERE uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
            if ($order['order_type'] == '1') {
                $user = pdo_fetch('SELECT * FROM' . tablename('hulu_love_user') . 'WHERE uniacid=:uniacid AND openid=:openid', array(':uniacid' => $_W['uniacid'], ':openid' => $order['order_openid']));
                if ($user['upid'] == '4' && $user['vip_endtime'] > $_W['timestamp']) {
                    $newuser = array('upid' => '4', 'vip_endtime' => '86400' * $order['order_one'] + $user['vip_endtime']);
                } else {
                    $newuser = array('upid' => '4', 'vip_endtime' => '86400' * $order['order_one'] + $_W['timestamp']);
                }
                pdo_update('hulu_love_user', $newuser, array('uniacid' => $_W['uniacid'], 'openid' => $order['order_openid']));
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '1', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_openid'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '1', 'openid' => $order['order_openid'], 'system_openid' => $order['order_openid'], 'system_price' => $order['order_price'], 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
            } elseif ($order['order_type'] == '2') {
                global $_W;
                $contact = array('uniacid' => $_W['uniacid'], 'openid' => $order['order_two'], 'contact_openid' => $order['order_openid'], 'contact_price' => $order['order_price'], 'contact_time' => $_W['timestamp'], 'contact_ip' => $_W['clientip'], 'contact_container' => $_W['container'], 'contact_os' => $_W['os']);
                pdo_insert('hulu_love_contact', $contact);
                $money = array('uniacid' => $_W['uniacid'], 'money_pid' => '1', 'money_type' => '2', 'openid' => $order['order_two'], 'money_openid' => $order['order_openid'], 'money_price' => $order['order_price'] * $make['make_two_divided'], 'money_time' => $_W['timestamp'], 'money_ip' => $_W['clientip'], 'money_container' => $_W['container'], 'money_os' => $_W['os']);
                pdo_insert('hulu_love_money', $money);
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '2', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_openid'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '2', 'openid' => $order['order_two'], 'system_openid' => $order['order_openid'], 'system_price' => $order['order_price'], 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
            } elseif ($order['order_type'] == '3') {
                $money = array('uniacid' => $_W['uniacid'], 'money_pid' => '1', 'money_type' => '3', 'openid' => $order['order_three'], 'money_openid' => $order['order_openid'], 'money_price' => $order['order_price'] * $make['make_three_divided'], 'money_time' => $_W['timestamp'], 'money_ip' => $_W['clientip'], 'money_container' => $_W['container'], 'money_os' => $_W['os']);
                pdo_insert('hulu_love_money', $money);
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '3', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_three'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '3', 'openid' => $order['order_openid'], 'system_openid' => $order['order_three'], 'system_price' => $order['order_price'] * (1 - $make['make_three_divided']), 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
                $enjoy = array('uniacid' => $_W['uniacid'], 'openid' => $order['order_three'], 'enjoy_openid' => $order['order_openid'], 'enjoy_money' => $order['order_price'] * $make['make_three_divided'], 'enjoy_time' => $_W['timestamp'], 'enjoy_ip' => $_W['clientip'], 'enjoy_container' => $_W['container'], 'enjoy_os' => $_W['os']);
                pdo_insert('hulu_love_enjoy', $enjoy);
            } elseif ($order['order_type'] == '4') {
                $money = array('uniacid' => $_W['uniacid'], 'money_pid' => '1', 'money_type' => '4', 'openid' => $order['order_four'], 'money_openid' => $order['order_openid'], 'money_price' => $order['order_price'] * $make['make_four_divided'], 'money_time' => $_W['timestamp'], 'money_ip' => $_W['clientip'], 'money_container' => $_W['container'], 'money_os' => $_W['os']);
                pdo_insert('hulu_love_money', $money);
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '4', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_four'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '4', 'openid' => $order['order_four'], 'system_openid' => $order['order_openid'], 'system_price' => $order['order_price'] * (1 - $make['make_four_divided']), 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
				$gift = array('uniacid' => $_W['uniacid'], 'store_pid'=>1,'openid' => $order['order_openid'], 'store_openid' => $order['order_four'], 'gift_id' => $order['order_four_2'],'store_time' => $_W['timestamp'], 'store_ip' => $_W['clientip'], 'store_container' => $_W['container'], 'store_os' => $_W['os']);
                pdo_insert('hulu_love_store', $gift);
				$sid = pdo_fetchcolum("select store_id from ".tablename('hulu_love_store')." where gift_id = {$order['order_four_2']} and store_openid = '{$_W['openid']}' order by store_id ");
				pdo_delete('hulu_love_store', array( 'store_id' => $sid));
				
				
				$nickname = pdo_fetchcolumn("select nickname from ".tablename('hulu_love_user')." where uniacid={$_W['uniacid']} and openid = '{$order['order_openid']}'");
				$uid = pdo_fetchcolumn("select uid from ".tablename('hulu_love_user')." where uniacid={$_W['uniacid']} and openid = '{$order['order_openid']}'");
				$data=array(
				"touser"=>$order['order_four'],
				"msgtype"=>"news",
				"news"=>array(
				"articles"=>array(
				array(
				"title"=>$nickname."送了您一份礼物！",
				"description"=>"收到新礼物，快去看看吧！",
				"url"=>$_W['siteroot'].substr($this->createMobileUrl('view',array('uid'=>$uid)),2),
				//"picurl"=>"http://wx.asapp.cn/addons/jy_ppp/images/notice.jpg",
				),
				),
				),
				);
				load()->classs('weixin.account');
				$accObj= WeixinAccount::create($_W['uniacid']);
				$access_token = $accObj->fetch_token();
				
				   
				$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
				
				$data = json_encode($data, JSON_UNESCAPED_UNICODE);
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
				if (!empty($data)) {
					curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				}
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($curl);
				curl_close($curl);
				
				
				
            } elseif ($order['order_type'] == '7') {
                pdo_update('hulu_love_join', array('join_pid' => '3'), array('uniacid' => $_W['uniacid'], 'openid' => $order['order_openid'], 'join_id' => $order['order_seven']));
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '7', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_openid'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '7', 'openid' => $order['order_openid'], 'system_openid' => $order['order_openid'], 'system_price' => $order['order_price'], 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
            } elseif ($order['order_type'] == '9') {
                $money = array('uniacid' => $_W['uniacid'], 'money_pid' => '1', 'money_type' => '9', 'openid' => $order['order_nine_2'], 'money_openid' => $order['order_openid'], 'money_price' => $order['order_price'] * $make['make_nine_divided'], 'money_time' => $_W['timestamp'], 'money_ip' => $_W['clientip'], 'money_container' => $_W['container'], 'money_os' => $_W['os']);
                pdo_insert('hulu_love_money', $money);
                $pay = array('uniacid' => $_W['uniacid'], 'pay_pid' => '2', 'pay_type' => '9', 'openid' => $order['order_openid'], 'pay_openid' => $order['order_nine_2'], 'pay_price' => $order['order_price'], 'pay_time' => $_W['timestamp'], 'pay_ip' => $_W['clientip'], 'pay_container' => $_W['container'], 'pay_os' => $_W['os']);
                pdo_insert('hulu_love_pay', $pay);
                $system = array('uniacid' => $_W['uniacid'], 'system_pid' => '1', 'system_type' => '9', 'openid' => $order['order_nine_2'], 'system_openid' => $order['order_openid'], 'system_price' => $order['order_price'] * (1 - $make['make_nine_divided']), 'system_time' => $_W['timestamp'], 'system_ip' => $_W['clientip'], 'system_container' => $_W['container'], 'system_os' => $_W['os']);
                pdo_insert('hulu_love_system', $system);
            } else {
            }
            if ($params['fee'] != $order['fee']) {
                die('用户支付的金额与订单金额不符合');
            }
        }
        if (empty($params['result']) || $params['result'] != 'success') {
        }
        if ($params['from'] == 'return') {
            if ($params['result'] == 'success') {
                message('支付成功！', $this->createMobileUrl('my'), 'success');
            } else {
                message('支付失败！', $this->createMobileUrl('my'), 'error');
            }
        }
    }
}