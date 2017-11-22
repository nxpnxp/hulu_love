<?php

global $_W,$_GPC;
include 'function.php';
$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
include $this->template('enjoy');
?>