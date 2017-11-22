<?php

global $_W;

include 'function.php';

$contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid ORDER BY contact_id DESC",array(':uniacid'=>$_W['uniacid']));

include $this->template('web/contact');
?>