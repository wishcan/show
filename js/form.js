$(function(){
	$("input[type='text'],input[type='password']").focus(function(){

		$(this).addClass("inputFocus");


	})
	$("input[type='text'],input[type='password']").blur(function(){

		$(this).removeClass("inputFocus");

	})
$(".button-column a img").css({"width":"11","height":"11"});
	$(".button-column a img").hover(function(){
		$(this).css({"width":13,"height":13});
	},function(){
		$(this).css({"width":11,"height":11});
	})
	$(".button-column .delete").hover(function(){
			
		$(this).css("background",'none');
	})
/*
上传文件删除JS效果

*/
$("#smallImg").hide();

$("div.form #smallImg .close").live('click',function(){
		var v=$(this).next('img').attr('val'); /* 获得图片的文件名*/
		var th=$(this);
		$.post(
			'/show/index.php/Upload/delete',
			{data:v},
			function(data){
				$(th).next("img").remove();
				$(th).remove();
				$("input[value='"+v+"']").remove();
				if($("#smallImg img").length==0)
				{
					$("#smallImg").hide();
				}
			}
			)

    })

})
