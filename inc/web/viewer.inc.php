<?php

global $_W,$_GPC;

include 'function.php';
$viewer=pdo_fetchall("SELECT * FROM".tablename('hulu_love_viewer')."WHERE uniacid=:uniacid ORDER BY viewer_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/viewer');

?>