window.load=$(function(){
	$("input[type]").focus(function(){

		$(this).addClass("inputFocus");


	})
	$("input[type]").blur(function(){

		$(this).removeClass("inputFocus");

	})




})