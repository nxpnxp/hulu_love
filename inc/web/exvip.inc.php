<?php
global $_W,$_GPC;

include 'function.php';
$unid = 'a.'.$_W['uniacid'];

//VIP会员
$data = pdo_fetchall("SELECT a.nickname,a.sex,a.age,a.height,a.weight,a.wechat,a.address,b.more_real_tel_num,more_real_card_name,more_real_card_num FROM ".tablename('hulu_love_user')." a left join " . tablename('hulu_love_more')." b on a.openid=b.openid WHERE a.uniacid={$_W['uniacid']} AND upid=4 ORDER BY uid DESC");
//echo pdo_fetchall("SELECT a.nickname,a.sex,a.age,a.height,a.weight,a.wechat,a.address,b.more_real_tel_num,more_real_card_name,more_real_card_num FROM ".tablename('hulu_love_user')." a left join " . tablename('hulu_love_more')." b on a.openid=b.openid WHERE uniacid={$_W['uniacid']} AND upid=4 ORDER BY uid DESC");
foreach($data as $k=>$v){
	if($v['sex']==1){
		$data[$k]['sex']='男';
	}else{
		$data[$k]['sex']='女';
	}
}
//引入PHPExcel库文件（路径根据自己情况）
include './Classes/PHPExcel.php';
//创建对象
$excel = new PHPExcel();
$letter = array('A','B','C','D','E','F','G','H','I','J','K');
$tableheader = array('昵称','性别','年龄','身高','体重','微信','地址','手机','姓名','身份证号');
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
header('Content-Disposition:attachment;filename="VIP.xls"');
header("Content-Transfer-Encoding:binary");
$write->save('php://output');
?>