<?php 
	//这个操作被定义用来呈现 功能封面
	global $_GPC, $_W;
	$openid  = $_W['openid'];
	$uniacid = $_W['uniacid'];
	$sql = "SELECT  lu.nickname,lu.uid,lu.openid, lu.avatar, lu.upid, ln.news_content, ln.news_time, ln.news_type FROM  ".tablename('hulu_love_news')." as ln LEFT JOIN
	".tablename('hulu_love_user')." as lu
	ON ln.openid = lu.openid WHERE ln.news_openid = '{$openid}' and ln.uniacid = '{$uniacid}'";
	$new_list = pdo_fetchall($sql);

	if($new_list){
		foreach($new_list as $new){
			$news[$new['uid']]['nickname'] 		= $new['nickname'];
			$news[$new['uid']]['avatar'] 		= $new['avatar'];
			$news[$new['uid']]['openid'] 		= $new['openid'];
			$news[$new['uid']]['upid'] 			= $new['upid'];
			$news[$new['uid']]['news_content'] 	= $new['news_content'];
			$news[$new['uid']]['news_time'] 	= $new['news_time'];
			$news[$new['uid']]['point'] 		= $this->mDate($new['news_time']);

			if($new['news_type']=='1'){
				$news[$new['uid']]['news_type'] = $news[$new['uid']]['news_type']+1;
			}
		}
	}
	include $this->template('chat');
	
?>