$(function(){
	$("input[type='text']").focus(function(){

		$(this).addClass("inputFocus");


	})
	$("input[type='text']").blur(function(){

		$(this).removeClass("inputFocus");

	})

/*
上传文件删除JS效果

*/
$("#smallImg").hide();

$("div.form #smallImg .close").live('click',function(){
		var v=$(this).next('img').attr('val'); /* 获得图片的文件名*/
		var th=$(this);
		$.post(
			'/show/index.php?r=Upload/delete',
			{data:v},
			function(data){
				$(th).next("img").remove();
				$(th).remove();
				$("input[value='"+v+"']").remove();
			}
			)

    })

})
