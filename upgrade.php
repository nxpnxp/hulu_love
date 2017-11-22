<?php
$sql="CREATE TABLE IF NOT EXISTS `ims_hulu_love_active` (
  `active_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `active_pid` int(10) unsigned NOT NULL DEFAULT '3',
  `openid` varchar(100) NOT NULL,
  `active_title` text NOT NULL,
  `active_type` int(10) NOT NULL,
  `active_boy` int(10) NOT NULL,
  `active_girl` int(10) NOT NULL,
  `active_money` decimal(10,2) NOT NULL,
  `active_address` text NOT NULL,
  `active_starttime` varchar(100) NOT NULL,
  `active_endtime` varchar(100) NOT NULL,
  `active_tel` varchar(100) NOT NULL,
  `active_content` text NOT NULL,
  `active_time` varchar(100) NOT NULL,
  `active_ip` varchar(100) NOT NULL,
  `active_container` varchar(100) NOT NULL,
  `active_os` varchar(100) NOT NULL,
  PRIMARY KEY (`active_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `admin_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `admin_did` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `admin_time` varchar(100) NOT NULL,
  `admin_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_ads` (
  `ads_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `ads_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `ads_did` int(10) NOT NULL,
  `ads_title` varchar(100) NOT NULL,
  `ads_pic` text NOT NULL,
  `ads_link` text NOT NULL,
  `ads_time` varchar(100) NOT NULL,
  `ads_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_city` (
  `city_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `city_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `city_did` int(10) NOT NULL,
  `city_type` int(10) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_value` int(10) NOT NULL,
  `city_time` varchar(100) NOT NULL,
  `city_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_contact` (
  `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `contact_openid` varchar(100) NOT NULL,
  `contact_price` decimal(10,2) NOT NULL,
  `contact_time` varchar(100) NOT NULL,
  `contact_ip` varchar(100) NOT NULL,
  `contact_container` varchar(100) NOT NULL,
  `contact_os` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_enjoy` (
  `enjoy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `enjoy_openid` varchar(100) NOT NULL,
  `enjoy_money` decimal(10,2) NOT NULL,
  `enjoy_time` varchar(100) NOT NULL,
  `enjoy_ip` varchar(100) NOT NULL,
  `enjoy_container` varchar(100) NOT NULL,
  `enjoy_os` varchar(100) NOT NULL,
  PRIMARY KEY (`enjoy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_gift` (
  `gift_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `gift_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `gift_did` int(10) NOT NULL,
  `gift_name` varchar(100) NOT NULL,
  `gift_pic` text NOT NULL,
  `gift_price` decimal(10,2) NOT NULL,
  `gift_time` varchar(100) NOT NULL,
  `gift_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`gift_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_guanli` (
  `guanli_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `guanli_title` varchar(100) NOT NULL,
  `guanli_template` int(10) NOT NULL,
  `guanli_authcode` varchar(100) NOT NULL,
  `guanli_kefu_wechat` varchar(100) NOT NULL,
  `guanli_openid` varchar(100) NOT NULL,
  `guanli_key` varchar(100) NOT NULL,
  `guanli_secret` varchar(100) NOT NULL,
  `guanli_sign` varchar(100) NOT NULL,
  `guanli_msgtemplate` varchar(100) NOT NULL,
  `guanli_fengmian_marquee` text NOT NULL,
  `guanli_share_title` text NOT NULL,
  `guanli_share_content` text NOT NULL,
  `guanli_share_pic` text NOT NULL,
  `guanli_time` varchar(100) NOT NULL,
  `guanli_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`guanli_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_join` (
  `join_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `join_pid` int(10) unsigned NOT NULL DEFAULT '2',
  `openid` varchar(100) NOT NULL,
  `join_sex` int(10) NOT NULL,
  `active_id` int(10) NOT NULL,
  `join_name` varchar(100) NOT NULL,
  `join_wechat` varchar(100) NOT NULL,
  `join_tel` varchar(100) NOT NULL,
  `join_time` varchar(100) NOT NULL,
  `join_ip` varchar(100) NOT NULL,
  `join_container` varchar(100) NOT NULL,
  `join_os` varchar(100) NOT NULL,
  PRIMARY KEY (`join_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_like` (
  `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `like_openid` varchar(100) NOT NULL,
  `like_time` varchar(100) NOT NULL,
  `like_ip` varchar(100) NOT NULL,
  `like_container` varchar(100) NOT NULL,
  `like_os` varchar(100) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_make` (
  `make_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `make_uid_start` int(10) NOT NULL,
  `make_reg_upid` int(10) unsigned NOT NULL DEFAULT '2',
  `make_vip_year` decimal(10,2) NOT NULL,
  `make_vip_quarter` decimal(10,2) NOT NULL,
  `make_vip_month` decimal(10,2) NOT NULL,
  `make_vip_watch_oneday` int(10) NOT NULL,
  `make_news_oneday` int(10) NOT NULL,
  `make_active_pay` decimal(10,2) NOT NULL,
  `make_share_money` decimal(10,2) NOT NULL,
  `make_contact_show` int(10) NOT NULL,
  `make_contact_girlmoney` decimal(10,2) NOT NULL,
  `make_contact_boymoney` decimal(10,2) NOT NULL,
  `make_contact_nomoney` decimal(10,2) NOT NULL,
  `make_two_divided` decimal(10,2) NOT NULL,
  `make_three_divided` decimal(10,2) NOT NULL,
  `make_four_divided` decimal(10,2) NOT NULL,
  `make_five_divided` decimal(10,2) NOT NULL,
  `make_withdraw_money` decimal(10,2) NOT NULL,
  `make_girl_money` decimal(10,2) NOT NULL,
  `make_girl_age` int(10) NOT NULL,
  `make_girl_height` int(10) NOT NULL,
  `make_girl_weight` int(10) NOT NULL,
  `make_boy_money` decimal(10,2) NOT NULL,
  `make_boy_age` int(10) NOT NULL,
  `make_boy_height` int(10) NOT NULL,
  `make_boy_weight` int(10) NOT NULL,
  `make_no_money` decimal(10,2) NOT NULL,
  `make_no_age` int(10) NOT NULL,
  `make_no_height` int(10) NOT NULL,
  `make_no_weight` int(10) NOT NULL,
  `make_time` varchar(100) NOT NULL,
  `make_ip` varchar(100) NOT NULL,
  `make_nine_divided` varchar(100) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_money` (
  `money_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `money_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `money_type` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `money_openid` varchar(100) NOT NULL,
  `money_price` decimal(10,2) NOT NULL,
  `money_time` varchar(100) NOT NULL,
  `money_ip` varchar(100) NOT NULL,
  `money_container` varchar(100) NOT NULL,
  `money_os` varchar(100) NOT NULL,
  PRIMARY KEY (`money_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_more` (
  `more_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `more_real_tel` int(10) unsigned NOT NULL DEFAULT '1',
  `more_real_card` int(10) unsigned NOT NULL DEFAULT '1',
  `more_real_video` int(10) unsigned NOT NULL DEFAULT '1',
  `more_real_self` int(10) unsigned NOT NULL DEFAULT '1',
  `more_real_tel_num` varchar(100) NOT NULL,
  `more_real_tel_authcode` varchar(100) NOT NULL,
  `more_real_card_name` varchar(100) NOT NULL,
  `more_real_card_num` varchar(100) NOT NULL,
  `more_real_card_pic1` text NOT NULL,
  `more_real_card_pic2` text NOT NULL,
  `more_real_card_pic3` text NOT NULL,
  `more_withdraw_wechat` varchar(100) NOT NULL,
  `more_withdraw_wechat_qrcode` text NOT NULL,
  `more_withdraw_alipay` varchar(100) NOT NULL,
  `more_withdraw_alipay_qrcode` text NOT NULL,
  `more_time` varchar(100) NOT NULL,
  `more_ip` varchar(100) NOT NULL,
  `more_container` varchar(100) NOT NULL,
  `more_os` varchar(100) NOT NULL,
  PRIMARY KEY (`more_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_moreads` (
  `moreads_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `moreads_page` int(10) NOT NULL,
  `moreads_pic` text NOT NULL,
  `moreads_title` varchar(100) NOT NULL,
  `moreads_link` text NOT NULL,
  `moreads_time` varchar(100) NOT NULL,
  `moreads_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`moreads_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `news_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `news_type` int(10) unsigned NOT NULL DEFAULT '1',
  `openid` varchar(100) NOT NULL,
  `news_content` text NOT NULL,
  `news_openid` varchar(100) NOT NULL,
  `news_time` varchar(100) NOT NULL,
  `news_ip` varchar(100) NOT NULL,
  `news_container` varchar(100) NOT NULL,
  `news_os` varchar(100) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `order_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `order_type` int(10) NOT NULL,
  `order_num` varchar(100) NOT NULL,
  `order_openid` varchar(100) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_starttime` varchar(100) NOT NULL,
  `order_endtime` varchar(100) NOT NULL,
  `order_ip` varchar(100) NOT NULL,
  `order_container` varchar(100) NOT NULL,
  `order_os` varchar(100) NOT NULL,
  `order_one` int(10) NOT NULL,
  `order_two` varchar(100) NOT NULL,
  `order_three` varchar(100) NOT NULL,
  `order_four` varchar(100) NOT NULL,
  `order_four_2` int(10) NOT NULL,
  `order_seven` int(10) NOT NULL,
  `order_nine` int(10) NOT NULL,
  `order_nine_2` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_pay` (
  `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `pay_pid` int(10) unsigned NOT NULL DEFAULT '2',
  `pay_type` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `pay_openid` varchar(100) NOT NULL,
  `pay_price` decimal(10,2) NOT NULL,
  `pay_time` varchar(100) NOT NULL,
  `pay_ip` varchar(100) NOT NULL,
  `pay_container` varchar(100) NOT NULL,
  `pay_os` varchar(100) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_photos` (
  `pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `pic_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `openid` varchar(100) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_url` text NOT NULL,
  `pic_time` varchar(100) NOT NULL,
  `pic_ip` varchar(100) NOT NULL,
  `pic_container` varchar(100) NOT NULL,
  `pic_os` varchar(100) NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_pinglun` (
  `pinglun_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `pinglun_pid` int(10) unsigned NOT NULL DEFAULT '2',
  `talk_id` int(10) NOT NULL,
  `pinglun_content` text NOT NULL,
  `pinglun_time` varchar(100) NOT NULL,
  `pinglun_ip` varchar(100) NOT NULL,
  `pinglun_container` varchar(100) NOT NULL,
  `pinglun_os` varchar(100) NOT NULL,
  PRIMARY KEY (`pinglun_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_receive` (
  `receive_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `receive_openid` varchar(100) NOT NULL,
  `gift_id` int(10) NOT NULL,
  `gift_price` decimal(10,2) NOT NULL,
  `receive_time` varchar(100) NOT NULL,
  `receive_ip` varchar(100) NOT NULL,
  `receive_container` varchar(100) NOT NULL,
  `receive_os` varchar(100) NOT NULL,
  PRIMARY KEY (`receive_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_request` (
  `request_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `request_age_small` varchar(100) NOT NULL,
  `request_age_big` varchar(100) NOT NULL,
  `request_height_small` varchar(100) NOT NULL,
  `request_height_big` varchar(100) NOT NULL,
  `request_weight_small` varchar(100) NOT NULL,
  `request_weight_big` varchar(100) NOT NULL,
  `request_salary` int(10) NOT NULL,
  `request_education` int(10) NOT NULL,
  `request_area` int(10) NOT NULL,
  `request_time` varchar(100) NOT NULL,
  `request_ip` varchar(100) NOT NULL,
  `request_container` varchar(100) NOT NULL,
  `request_os` varchar(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_share` (
  `share_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `share_openid` varchar(100) NOT NULL,
  `share_money` decimal(10,0) NOT NULL,
  `share_time` varchar(100) NOT NULL,
  `share_ip` varchar(100) NOT NULL,
  `share_container` varchar(100) NOT NULL,
  `share_os` varchar(100) NOT NULL,
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_store` (
  `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `store_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `openid` varchar(100) NOT NULL,
  `store_openid` varchar(100) NOT NULL,
  `gift_id` int(10) NOT NULL,
  `store_time` varchar(100) NOT NULL,
  `store_ip` varchar(100) NOT NULL,
  `store_container` varchar(100) NOT NULL,
  `store_os` varchar(100) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_system` (
  `system_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `system_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `system_type` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `system_openid` varchar(100) NOT NULL,
  `system_price` decimal(10,2) NOT NULL,
  `system_time` varchar(100) NOT NULL,
  `system_ip` varchar(100) NOT NULL,
  `system_container` varchar(100) NOT NULL,
  `system_os` varchar(100) NOT NULL,
  PRIMARY KEY (`system_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_talk` (
  `talk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `talk_pid` int(10) unsigned NOT NULL DEFAULT '1',
  `talk_did` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `talk_content` text NOT NULL,
  `talk_pic1` text NOT NULL,
  `talk_pic2` text NOT NULL,
  `talk_pic3` text NOT NULL,
  `talk_view` int(10) unsigned NOT NULL DEFAULT '0',
  `talk_time` varchar(100) NOT NULL,
  `talk_ip` varchar(100) NOT NULL,
  `talk_container` varchar(100) NOT NULL,
  `talk_os` varchar(100) NOT NULL,
  PRIMARY KEY (`talk_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_tplnotice` (
  `notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `notice_ads` text NOT NULL,
  `notice_news_timegap` varchar(100) NOT NULL,
  `notice_news_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_reg_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_vip_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_contact_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_enjoy_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_gift_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_share_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_active_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_withdraw_if` int(10) unsigned NOT NULL DEFAULT '1',
  `notice_news_num` varchar(100) NOT NULL,
  `notice_reg_num` varchar(100) NOT NULL,
  `notice_vip_num` varchar(100) NOT NULL,
  `notice_contact_num` varchar(100) NOT NULL,
  `notice_enjoy_num` varchar(100) NOT NULL,
  `notice_gift_num` varchar(100) NOT NULL,
  `notice_share_num` varchar(100) NOT NULL,
  `notice_active_num` varchar(100) NOT NULL,
  `notice_withdraw_num` varchar(100) NOT NULL,
  `notice_time` varchar(100) NOT NULL,
  `notice_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `upid` int(10) unsigned NOT NULL DEFAULT '2',
  `openid` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `avatar` text NOT NULL,
  `ureal` int(10) unsigned NOT NULL DEFAULT '1',
  `vip_endtime` varchar(100) NOT NULL,
  `sex` int(10) unsigned NOT NULL DEFAULT '0',
  `age` int(10) NOT NULL,
  `bornyear` varchar(100) NOT NULL,
  `height` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `purpose` int(10) NOT NULL,
  `feeling` int(10) NOT NULL,
  `married` int(10) NOT NULL,
  `wechat` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `city` int(10) NOT NULL,
  `address` text NOT NULL,
  `content` text NOT NULL,
  `contact_money` decimal(10,2) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `view` int(10) unsigned NOT NULL DEFAULT '0',
  `logintime` varchar(100) NOT NULL,
  `loginip` varchar(100) NOT NULL,
  `logincontainer` varchar(100) NOT NULL,
  `loginos` varchar(100) NOT NULL,
  `regtime` varchar(100) NOT NULL,
  `regip` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_viewer` (
  `viewer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `viewer_openid` varchar(100) NOT NULL,
  `viewer_nickname` varchar(100) NOT NULL,
  `viewer_avatar` text NOT NULL,
  `viewer_sex` int(10) unsigned NOT NULL DEFAULT '0',
  `viewer_time` varchar(100) NOT NULL,
  `viewer_ip` varchar(100) NOT NULL,
  `viewer_container` varchar(100) NOT NULL,
  `viewer_os` varchar(100) NOT NULL,
  PRIMARY KEY (`viewer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_withdraw` (
  `with_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `with_pid` int(10) unsigned NOT NULL DEFAULT '2',
  `openid` varchar(100) NOT NULL,
  `with_money` decimal(10,2) NOT NULL,
  `with_content` text NOT NULL,
  `with_time` varchar(100) NOT NULL,
  `with_ip` varchar(100) NOT NULL,
  `with_container` varchar(100) NOT NULL,
  `with_os` varchar(100) NOT NULL,
  PRIMARY KEY (`with_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_hulu_love_zan` (
  `zan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `talk_id` int(10) NOT NULL,
  `zan_time` varchar(100) NOT NULL,
  `zan_ip` varchar(100) NOT NULL,
  `zan_container` varchar(100) NOT NULL,
  `zan_os` varchar(100) NOT NULL,
  PRIMARY KEY (`zan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
";
pdo_run($sql);
if(!pdo_fieldexists('hulu_love_active',  'active_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_active',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_pid` int(10) unsigned NOT NULL DEFAULT '3';");
}
if(!pdo_fieldexists('hulu_love_active',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_title')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_title` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_boy')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_boy` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_girl')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_girl` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_address')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_address` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_starttime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_starttime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_endtime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_endtime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_tel')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_tel` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_active',  'active_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_active')." ADD `active_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_admin',  'admin_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_admin',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_admin',  'admin_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `admin_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_admin',  'admin_did')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `admin_did` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_admin',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_admin',  'admin_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `admin_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_admin',  'admin_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_admin')." ADD `admin_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_ads',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_did')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_did` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_title')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_title` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_pic')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_pic` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_link')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_link` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_ads',  'ads_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_ads')." ADD `ads_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_city',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_city',  'city_did')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_did` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_name')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_name` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_value')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_value` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_city',  'city_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_city')." ADD `city_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_contact',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_contact',  'contact_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_contact')." ADD `contact_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_enjoy',  'enjoy_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_enjoy')." ADD `enjoy_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_gift',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_did')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_did` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_name')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_name` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_pic')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_pic` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_gift',  'gift_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_gift')." ADD `gift_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_title')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_title` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_template')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_template` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_authcode')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_authcode` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_kefu_wechat')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_kefu_wechat` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_key')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_key` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_secret')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_secret` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_sign')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_sign` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_msgtemplate')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_msgtemplate` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_fengmian_marquee')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_fengmian_marquee` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_share_title')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_share_title` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_share_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_share_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_share_pic')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_share_pic` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_guanli',  'guanli_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_guanli')." ADD `guanli_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_join',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_pid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_join',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_sex')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_sex` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'active_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `active_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_name')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_name` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_wechat')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_wechat` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_tel')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_tel` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_join',  'join_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_join')." ADD `join_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_like',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_like',  'like_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_like')." ADD `like_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_make',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_uid_start')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_uid_start` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_reg_upid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_reg_upid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_make',  'make_vip_year')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_vip_year` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_vip_quarter')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_vip_quarter` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_vip_month')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_vip_month` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_vip_watch_oneday')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_vip_watch_oneday` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_news_oneday')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_news_oneday` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_active_pay')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_active_pay` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_share_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_share_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_contact_show')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_contact_show` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_contact_girlmoney')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_contact_girlmoney` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_contact_boymoney')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_contact_boymoney` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_contact_nomoney')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_contact_nomoney` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_two_divided')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_two_divided` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_three_divided')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_three_divided` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_four_divided')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_four_divided` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_five_divided')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_five_divided` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_withdraw_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_withdraw_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_girl_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_girl_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_girl_age')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_girl_age` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_girl_height')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_girl_height` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_girl_weight')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_girl_weight` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_boy_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_boy_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_boy_age')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_boy_age` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_boy_height')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_boy_height` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_boy_weight')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_boy_weight` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_no_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_no_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_no_age')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_no_age` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_no_height')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_no_height` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_no_weight')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_no_weight` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_make',  'make_nine_divided')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_make')." ADD `make_nine_divided` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_money',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_money',  'money_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_money',  'money_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_money')." ADD `money_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_more',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_tel')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_tel` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_video')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_video` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_self')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_self` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_tel_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_tel_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_tel_authcode')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_tel_authcode` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card_name')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card_name` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card_pic1')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card_pic1` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card_pic2')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card_pic2` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_real_card_pic3')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_real_card_pic3` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_withdraw_wechat')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_withdraw_wechat` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_withdraw_wechat_qrcode')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_withdraw_wechat_qrcode` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_withdraw_alipay')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_withdraw_alipay` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_withdraw_alipay_qrcode')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_withdraw_alipay_qrcode` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_more',  'more_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_more')." ADD `more_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_page')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_page` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_pic')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_pic` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_title')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_title` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_link')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_link` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_moreads',  'moreads_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_moreads')." ADD `moreads_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_news',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_news',  'news_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_type` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_news',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_news',  'news_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_news')." ADD `news_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_order',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_order',  'order_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_starttime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_starttime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_endtime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_endtime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_one')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_one` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_two')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_two` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_three')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_three` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_four')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_four` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_four_2')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_four_2` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_seven')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_seven` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_nine')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_nine` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_order',  'order_nine_2')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_order')." ADD `order_nine_2` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_pay',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_pid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pay',  'pay_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pay')." ADD `pay_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_photos',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_photos',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_name')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_name` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_url')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_url` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_photos',  'pic_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_photos')." ADD `pic_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_pid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'talk_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `talk_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_pinglun',  'pinglun_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_pinglun')." ADD `pinglun_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_receive',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'gift_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `gift_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'gift_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `gift_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_receive',  'receive_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_receive')." ADD `receive_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_request',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_age_small')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_age_small` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_age_big')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_age_big` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_height_small')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_height_small` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_height_big')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_height_big` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_weight_small')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_weight_small` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_weight_big')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_weight_big` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_salary')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_salary` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_education')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_education` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_area')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_area` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_request',  'request_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_request')." ADD `request_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_share',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_money` decimal(10,0) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_share',  'share_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_share')." ADD `share_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_store',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_store',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'gift_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `gift_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_store',  'store_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_store')." ADD `store_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_system',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_system',  'system_type')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_type` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_price')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_price` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_system',  'system_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_system')." ADD `system_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_talk',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_pid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_did')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_did` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_pic1')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_pic1` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_pic2')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_pic2` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_pic3')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_pic3` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_view')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_view` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_talk',  'talk_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_talk')." ADD `talk_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_ads')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_ads` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_news_timegap')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_news_timegap` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_news_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_news_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_reg_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_reg_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_vip_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_vip_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_contact_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_contact_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_enjoy_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_enjoy_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_gift_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_gift_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_share_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_share_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_active_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_active_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_withdraw_if')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_withdraw_if` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_news_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_news_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_reg_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_reg_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_vip_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_vip_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_contact_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_contact_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_enjoy_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_enjoy_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_gift_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_gift_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_share_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_share_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_active_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_active_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_withdraw_num')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_withdraw_num` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_tplnotice',  'notice_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_tplnotice')." ADD `notice_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `uid` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_user',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'upid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `upid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_user',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'nickname')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `nickname` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'avatar')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `avatar` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'ureal')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `ureal` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('hulu_love_user',  'vip_endtime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `vip_endtime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'sex')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `sex` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('hulu_love_user',  'age')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `age` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'bornyear')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `bornyear` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'height')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `height` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'weight')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `weight` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'purpose')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `purpose` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'feeling')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `feeling` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'married')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `married` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'wechat')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `wechat` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'tel')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `tel` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'city')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `city` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'address')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `address` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'contact_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `contact_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'lon')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `lon` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'lat')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `lat` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'view')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `view` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('hulu_love_user',  'logintime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `logintime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'loginip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `loginip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'logincontainer')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `logincontainer` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'loginos')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `loginos` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'regtime')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `regtime` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_user',  'regip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_user')." ADD `regip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_nickname')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_nickname` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_avatar')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_avatar` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_sex')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_sex` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_viewer',  'viewer_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_viewer')." ADD `viewer_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_pid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_pid` int(10) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_money')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_money` decimal(10,2) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_content')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_content` text NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_withdraw',  'with_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_withdraw')." ADD `with_os` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'zan_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `zan_id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('hulu_love_zan',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'talk_id')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `talk_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'zan_time')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `zan_time` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'zan_ip')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `zan_ip` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'zan_container')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `zan_container` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('hulu_love_zan',  'zan_os')) {
	pdo_query("ALTER TABLE ".tablename('hulu_love_zan')." ADD `zan_os` varchar(100) NOT NULL;");
}

?>