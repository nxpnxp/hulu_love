<?php

global $_W;
include 'function.php';
$withdraw=pdo_fetchall("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid ORDER BY with_id DESC",array(':uniacid'=>$_W['uniacid']));


include $this->template('web/withdraw');

?>