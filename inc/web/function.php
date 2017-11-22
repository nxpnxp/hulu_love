<?php



function getallmoney($openid,$uniacid){
	$nowmoney=pdo_fetchall("SELECT * FROM".tablename('hulu_love_money')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));

foreach($nowmoney as $key=>$nowmoney){
	$money+=$nowmoney['money_price'];
}
return "<span class='label label-success'>$money</span>";
}


function getvipendtime($vipopenid,$uniacid){

		$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$vipopenid));
	return $user['vip_endtime'];

}


function getage($nowage,$bornyear){

if(!empty($bornyear)){
		$age=round((time()-$bornyear)/31536000,0);
}else{
	$age=$nowage;
}
	return $age;	
}

function getcityname($cityid,$uniacid){
	$city=pdo_fetch("SELECT * FROM".tablename('hulu_love_city')."WHERE uniacid=:uniacid AND city_id=:city_id",array(':uniacid'=>$uniacid,':city_id'=>$cityid));
	return $city['city_name'];
	
}

function getactivemoney($activeid,$uniacid){
	$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$uniacid,':active_id'=>$activeid));

	$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$uniacid));
	return $active['active_money']*$make['make_active_pay'];


}

function getactivetitle($activeid,$uniacid){
	$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$uniacid,':active_id'=>$activeid));
	return $active['active_title'];
}

function gettalkpid($talkpid){

	if($talkpid=='1'){echo"<span class='label label-danger'>已屏蔽</span>";}
	if($talkpid=='2'){echo"<span class='label label-warning'>待审核</span>";}
	if($talkpid=='3'){echo"<span class='label label-success'>已通过</span>";}

}

function getrealcardpid($realcardpid){

	if($realcardpid=='1'){echo"<span class='label label-default'>未申请</span>";}
	if($realcardpid=='2'){echo"<span class='label label-warning'>待审核</span>";}
	if($realcardpid=='3'){echo"<span class='label label-danger'>未通过</span>";}
	if($realcardpid=='4'){echo"<span class='label label-success'>已通过</span>";}

}

function getwithdrawpid($withdrawpid){

	if($withdrawpid=='1'){echo"<span class='label label-default'>未成功</span>";}
	if($withdrawpid=='2'){echo"<span class='label label-danger'>待处理</span>";}
	if($withdrawpid=='3'){echo"<span class='label label-success'>已成功</span>";}

}


function gettalkdid($talkdid){

	if($talkdid=='1'){echo"<span class='label label-danger'>未置顶</span>";}
	if($talkdid=='2'){echo"<span class='label label-success'>已置顶</span>";}
	

}

function getadmindid($admindid){

	if($admindid=='2'){echo"<span class='label label-success'>总管理员</span>";}
	

}

function getactivepid($activepid){

	if($activepid=='1'){echo"<span class='label label-default'>已屏蔽</span>";}
	if($activepid=='2'){echo"<span class='label label-default'>已取消</span>";}
	if($activepid=='3'){echo"<span class='label label-warning'>待审核</span>";}
	if($activepid=='4'){echo"<span class='label label-success'>报名中</span>";}
	if($activepid=='5'){echo"<span class='label label-danger'>进行中</span>";}
	if($activepid=='6'){echo"<span class='label label-info'>已结束</span>";}

}

function getjoinpid($joinpid){
	if($joinpid=='1'){echo"<span class='label label-default'>已取消</span>";}
	if($joinpid=='2'){echo"<span class='label label-danger'>未成功</span>";}
	if($joinpid=='3'){echo"<span class='label label-success'>已成功</span>";}
}

function getjoinactivepid($joinactivepid,$uniacid){
	$active=pdo_fetch("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND active_id=:active_id",array(':uniacid'=>$uniacid,':active_id'=>$joinactivepid));

	$activepid=$active['active_pid'];

		if($activepid=='1'){echo"<span class='label label-default'>已屏蔽</span>";}
	if($activepid=='2'){echo"<span class='label label-default'>已取消</span>";}
	if($activepid=='3'){echo"<span class='label label-warning'>待审核</span>";}
	if($activepid=='4'){echo"<span class='label label-success'>报名中</span>";}
	if($activepid=='5'){echo"<span class='label label-danger'>进行中</span>";}
	if($activepid=='6'){echo"<span class='label label-info'>已结束</span>";}

}

function getuserdivided($uniacid,$orderid){
$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$uniacid));
$order=pdo_fetch("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_id=:order_id",array(':uniacid'=>$uniacid,':order_id'=>$orderid));

if($order['order_type']=='1'){echo"不分成";}

if($order['order_type']=='2'){echo ($order['order_price']*$make['make_two_divided']);}

if($order['order_type']=='3'){echo ($order['order_price']*$make['make_three_divided']);}
if($order['order_type']=='4'){echo ($order['order_price']*$make['make_four_divided']);}

if($order['order_type']=='7'){echo $order['order_price'];}
if($order['order_type']=='9'){echo ($order['order_price']*$make['make_nine_divided']);}


}

function getsystemdivided($uniacid,$orderid){
$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$uniacid));
$order=pdo_fetch("SELECT * FROM".tablename('hulu_love_order')."WHERE uniacid=:uniacid AND order_id=:order_id",array(':uniacid'=>$uniacid,':order_id'=>$orderid));
if($order['order_type']=='1'){echo $order['order_price'];}
if($order['order_type']=='2'){echo ($order['order_price']*(1-$make['make_two_divided']));}
if($order['order_type']=='3'){echo ($order['order_price']*(1-$make['make_three_divided']));}
if($order['order_type']=='4'){echo ($order['order_price']*(1-$make['make_four_divided']));}

if($order['order_type']=='7'){echo '系统代为保管';}

if($order['order_type']=='9'){echo ($order['order_price']*(1-$make['make_nine_divided']));}
}


function getupid($upid){
	if($upid=='1'){echo"<span class='label label-danger'>黑名单</span>";}
	if($upid=='2'){echo"<span class='label label-warning'>待审核会员</span>";}
	if($upid=='3'){echo"<span class='label label-info'>普通会员</span>";}
	if($upid=='4'){echo"<span class='label label-success'>VIP会员</span>";}


}

function getcitytype($citytype){
	if($citytype=='1'){echo"省（包括直辖市）";}
	if($citytype=='2'){echo"市（包括地级市）";}
	if($citytype=='3'){echo"县（包括县级市）";}
	if($citytype=='4'){echo"镇";}

}

function getpicpid($picpid){
	if($picpid=='1'){echo"<p style='background-color:red;'>已屏蔽</p>";}
	if($picpid=='2'){echo"<p style='background-color:yellow;'>待处理</p>";}
	if($picpid=='3'){echo"<p style='background-color:green;'>已通过</p>";}


}

function getuserupid($openid,$uniacid){
	
	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));
	$upid=$user['upid'];
	if($upid=='1'){echo"<span class='label label-danger'>黑名单</span>";}
	if($upid=='2'){echo"<span class='label label-warning'>待审核会员</span>";}
	if($upid=='3'){echo"<span class='label label-info'>普通会员</span>";}
	if($upid=='4'){echo"<span class='label label-success'>VIP会员</span>";}
	
}


function getnickname($openid,$uniacid){
	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));
	return $user['nickname'];
}
function getavatar($openid,$uniacid){
	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));
	return $user['avatar'];
}

function getgiftpic($giftid,$uniacid,$attach){
	$gift=pdo_fetch("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid AND gift_id=:gift_id",array(':uniacid'=>$uniacid,':gift_id'=>$giftid));
	return $attach.$gift['gift_pic'];
}

function getgiftname($giftid,$uniacid){
	$gift=pdo_fetch("SELECT * FROM".tablename('hulu_love_gift')."WHERE uniacid=:uniacid AND gift_id=:gift_id",array(':uniacid'=>$uniacid,':gift_id'=>$giftid));
	return $gift['gift_name'];
}

function getuid($openid,$uniacid){
	$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$uniacid,':openid'=>$openid));
	//echo"$this->createMobile('view',array('uid'=>$user['uid']))";
	return $user['uid'];
}

function getorderpid($orderpid){

	if($orderpid=='1'){echo"<span class='label label-danger'>未支付</span>";}
	if($orderpid=='2'){echo"<span class='label label-success'>已支付</span>";}
}

function gettrueorfalse($infopid){
	if($infopid=='1'){echo"<span class='label label-success'>显示</span>";}
	if($infopid=='2'){echo"<span class='label label-danger'>隐藏</span>";}
	
}

function getread($infotype){
	if($infotype=='1'){echo"<span class='label label-danger'>未读</span>";}
	if($infotype=='2'){echo"<span class='label label-success'>已读</span>";}
	
}


function getmoneytype($moneytype){
	if($moneytype=='1'){return'升级VIP';}
	if($moneytype=='2'){return'查看联系方式';}
	if($moneytype=='3'){return'打赏';}
	if($moneytype=='4'){return'赠送礼物';}
	if($moneytype=='5'){return'注册赠送';}
	if($moneytype=='6'){return'推广分享';}
	if($moneytype=='7'){return'活动报名';}
	if($moneytype=='9'){return'打赏说说';}
}

function getordertype($ordertype){
	if($ordertype=='1'){return'升级VIP';}
	if($ordertype=='2'){return'付费查看联系方式';}
	if($ordertype=='3'){return'打赏';}
	if($ordertype=='4'){return'赠送礼物';}
	if($ordertype=='5'){return'注册赠送';}
	if($ordertype=='6'){return'推广分享';}
	if($ordertype=='7'){return'活动报名';}
		if($ordertype=='9'){return'打赏说说';}

}

function getsex($sex){
	if($sex=='1'){echo "<span class='label label-primary'>男</span>";}
	if($sex=='2'){echo "<span class='label label-danger'>女</span>";}
	if($sex=='0'){echo "<span class='label label-default'>未知</span>";}

}

function getpurpose($purpose){
	if($purpose=='1'){$userpurpose='交友';}
	if($purpose=='2'){$userpurpose='相亲';}
	if($purpose=='3'){$userpurpose='约会';}
	if($purpose=='4'){$userpurpose='学习交流';}
	if($purpose=='5'){$userpurpose='其他';}
	return $userpurpose;
}

function getfeeling($feeling){
	if($feeling=='1'){$userfeeling='单身中';}
	if($feeling=='2'){$userfeeling='约会中';}
	if($feeling=='3'){$userfeeling='交往中';}
	return $userfeeling;
}

function getmarried($married){
	if($married=='1'){$usermarried='未婚';}
	if($married=='2'){$usermarried='已婚';}
	if($married=='3'){$usermarried='离异';}
	if($married=='4'){$usermarried='丧偶';}
	return $usermarried;
}

function getsalary($salary){
	if($salary=='1'){echo"我不在乎对方薪资";}
	if($salary=='2'){echo"1K以下";}
	if($salary=='3'){echo"1K-2K元";}
	if($salary=='4'){echo"2K-3K元";}
	if($salary=='5'){echo"3K-4K元";}
	if($salary=='6'){echo"4K-5K元";}
	if($salary=='7'){echo"5K-6K元";}
	if($salary=='8'){echo"6K-7K元";}
	if($salary=='9'){echo"7K-8K元";}
	if($salary=='10'){echo"8K-9K元";}
	if($salary=='11'){echo"9K-10K元";}
	if($salary=='12'){echo"10K-15K元";}
	if($salary=='13'){echo"15K-20K元";}
	if($salary=='14'){echo"20K元以上";}

}

function geteducation($education){
	if($education=='1'){echo"我不在乎对方学历";}
	if($education=='2'){echo"博士后";}
	if($education=='3'){echo"博士";}
	if($education=='4'){echo"硕士";}
	if($education=='5'){echo"研究生";}
	if($education=='6'){echo"大学本科";}
	if($education=='7'){echo"大专";}
	if($education=='8'){echo"高中";}
	if($education=='9'){echo"中专";}
	if($education=='10'){echo"初中";}
	if($education=='11'){echo"小学";}
}

function getarea($area){
	if($area=='1'){echo"我不在乎对方距离";}
	if($area=='2'){echo"同一乡镇";}
	if($area=='3'){echo"同一县城";}
	if($area=='4'){echo"同一市区";}
	if($area=='5'){echo"同一省份";}
	if($area=='6'){echo"同一国家";}
	if($area=='7'){echo"同一星球";}

}

	function getdaysgap($beforetime){
		$gaptime=$beforetime-time();
		
		
return floor($gaptime/86400).'天后';
		
	}


		function gettimegap($beforetime){
		$gaptime=time()-$beforetime;
		
		if($gaptime<'60'){return $gaptime.'秒前';}
		if($gaptime>='60'&&$gaptime<'3600'){return floor($gaptime/60).'分钟前';}
		if($gaptime>='3600'&&$gaptime<'86400'){return floor($gaptime/3600).'小时前';}
		if($gaptime>='86400'&&$gaptime<'2592000'){return floor($gaptime/86400).'天前';}
		if($gaptime>='2592000'&&$gaptime<'31536000'){return floor($gaptime/2592000).'月前';}
		if($gaptime>='31536000'){return date('Y-m-d',$logintime);}
	}

	function getrealtel($telpid){
		if($telpid=='1'){return"<span class='label label-danger'>手机未认证</span>";}
				if($telpid=='2'){return"<span class='label label-success'>手机已认证</span>";}
	}

		function getrealcard($cardpid){
		if($cardpid=='1'){return"<span class='label label-danger'>身份证未认证</span>";}
				if($cardpid=='2'){return"<span class='label label-default'>身份证未通过审核</span>";}
		if($cardpid=='3'){return"<span class='label label-warning'>身份证审核中</span>";}

				if($cardpid=='4'){return"<span class='label label-success'>身份证已认证</span>";}
	}

		function getrealself($selfpid){
		if($selfpid=='1'){return"<span class='label label-danger'>实地未认证</span>";}
				if($selfpid=='2'){return"<span class='label label-success'>实地已认证</span>";}
	}
?>