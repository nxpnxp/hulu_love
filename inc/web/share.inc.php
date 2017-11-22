<?php

global $_W;

include 'function.php';

$share=pdo_fetchall("SELECT * FROM".tablename('hulu_love_share')."WHERE uniacid=:uniacid ORDER BY share_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/share');
?>