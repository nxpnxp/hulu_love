<?php
global $_W,$_GPC;
include'function.php';


//$news=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:send_openid AND news_openid=:receive_openid OR news_openid=:ta_openid AND openid=:me_openid ORDER BY news_id ASC",array(':uniacid'=>$_W['uniacid'],':send_openid'=>$_W['openid'],':receive_openid'=>$_GPC['news_openid'],':ta_openid'=>$_GPC['news_openid'],':me_openid'=>$_W['openid']));
//我作为发布者
$news1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:send_openid AND news_openid=:receive_openid ",array(':uniacid'=>$_W['uniacid'],':send_openid'=>$_W['openid'],':receive_openid'=>$_GPC['news_openid']));
//我作为接收者
$news2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:send_openid AND news_openid=:receive_openid ",array(':uniacid'=>$_W['uniacid'],':send_openid'=>$_GPC['news_openid'],':receive_openid'=>$_W['openid']));

$news=array_merge($news1,$news2);


  
  foreach ($news as $key => $row) {
             
             $accuracy[$key] = $row['news_id'];
  }
  array_multisort($accuracy, SORT_ASC,$news);  


foreach($news as $key=>$news){
	//echo $news['news_content']."<br/>";
	include $this->template('news_list');
	
}



?>