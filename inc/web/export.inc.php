<?php

global $_W,$_GPC;

include 'function.php';
$active_id = $_GPC['active_id'];
$active_title = pdo_fetchcolumn("select active_title from " .tablename('hulu_love_active')." where active_id=$active_id");
$xslname = $active_title.'.xls';
$data = pdo_fetchall("SELECT join_name,join_sex,join_wechat,join_tel,join_time FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND active_id=:active_id AND join_pid=:join_pid ORDER BY join_id DESC",array(':uniacid'=>$_W['uniacid'],':active_id'=>$_GPC['active_id'],':join_pid'=>'3'));
foreach($data as $k=>$v){
	if($v['join_sex']==1){
		$data[$k]['join_sex']='男';
	}else{
		$data[$k]['join_sex']='女';
	}
	$data[$k]['join_time'] = date('Y-m-d H:i:s',$v['join_time']);
}
//引入PHPExcel库文件（路径根据自己情况）
include './Classes/PHPExcel.php';
//创建对象
$excel = new PHPExcel();
$letter = array('A','B','C','D','E','F','F','G');
$tableheader = array('姓名','性别','微信','电话','报名时间');
for($i = 0;$i < count($tableheader);$i++) {
$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
}
for ($i = 2;$i <= count($data) + 1;$i++) {
$j = 0;
foreach ($data[$i - 2] as $key=>$value) {
$excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
$j++;
}
}
$write = new PHPExcel_Writer_Excel5($excel);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");;
header('Content-Disposition:attachment;filename='.$xslname);
header("Content-Transfer-Encoding:binary");
$write->save('php://output');
?>