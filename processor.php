<?php
/**
 * 交友相亲模块处理程序
 *
 * @author 葫芦
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Hulu_loveModuleProcessor extends WeModuleProcessor {
	public function respond(){
		global $_W;
	
		$content = $this->message['content'];

		if($content=='hulong'){

			$my=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

if($my['sex']=='1'){$tasex="2";}
elseif($my['sex']=='2'){$tasex="1";}
elseif($my['sex']=='0'){$tasex=rand(1,2);}else{}

$userall=pdo_fetchall("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND sex=:sex",array(':uniacid'=>$_W['uniacid'],':sex'=>$tasex));
foreach($userall as $key=>$userall){
	$aaa[]=$userall['uid'];
}


function getnum($aaa){
return $user_rand=array_rand($aaa,1);
}

function getage($nowage,$bornyear){

if(!empty($bornyear)){
		$age=round(((time()-$bornyear)/31536000),0);
}else{
	$age=$nowage;
}
	return $age;	
}

for($x=1;$x<=8;$x++){
$num[]=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND uid=:uid",array(':uniacid'=>$_W['uniacid'],':uid'=>getnum($aaa)));

}



	

for($i=0;$i<=7;$i++){
$arr[]=array(
	 'title' => $num[$i]['nickname'].'，'.getage($num[$i]['age'],$num[$i]['bornyear']).'岁，'.$num[$i]['height'].'厘米，'.$num[$i]['weight'].'千克',
            'description' =>getage($num[$i]['age'],$num[$i]['bornyear']).'岁，'.$num[$i]['height'].'厘米，'.$num[$i]['weight'].'千克',
            'picurl' => $num[$i]['avatar'],
            'url' => $this->createMobileUrl('view',array('uid'=>$num[$i]['uid'])),
);

}


	
return $this->respNews($arr);


		}
}
	}