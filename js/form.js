window.load=$(function(){
	$("input[type]").focus(function(){

		$(this).addClass("inputFocus");


	})
	$("input[type]").blur(function(){

		$(this).removeClass("inputFocus");

	})


$("div.form #smallImg .close").live('click',function(){
		data=$(this).next('img').attr('val');
		$(this).next("img").remove();
		$(this).remove();
		$.post(
			'http://localhost/show/index.php?r=Upload/delete',
			{'data':data},
			function(data){

			}
			)
})

})
