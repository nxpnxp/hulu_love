<?php

global $_W;

include 'function.php';

$enjoy=pdo_fetchall("SELECT * FROM".tablename('hulu_love_enjoy')."WHERE uniacid=:uniacid ORDER BY enjoy_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/enjoy');
?>