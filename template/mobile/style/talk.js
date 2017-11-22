$(document).ready(function(){
$(".talk_list_d_3").click(function(){
$.post("{php echo $this->createMobileUrl('zan');}",
	{
	'talk_id',
	},
		function(data,status){
		//alert();
		      alert("数据：" + data + "\n状态：" + status);


	});
//$(this).html("已赞");

});
});