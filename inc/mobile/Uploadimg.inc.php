<?php


	global $_W,$_GPC;
		$media['type']=$_GPC['type']?$_GPC['type']:'image';
		$media['media_id']=$_GPC['media_id'];
		$account = WeAccount::create($_W['acid']);
		$groupid = $account->downloadMedia($media);
		echo  tomedia($groupid);

?>