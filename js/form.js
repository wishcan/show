$(function(){
	$("input[type]").focus(function(){

		$(this).addClass("inputFocus");


	})
	$("input[type]").blur(function(){

		$(this).removeClass("inputFocus");

	})
$("#smallImg").hide();

$("div.form #smallImg .close").live('click',function(){
		data=$(this).next('img').attr('val');
		var th=$(this);
		$.post(
			'/show/index.php?r=Upload/delete',
			{data:data},
			function(data){
				$(th).next("img").remove();
				$(th).remove();
			}
			)

    })

})
