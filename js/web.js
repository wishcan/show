$(function(){

$("#menu li").hover(function(){
	$(this).find("a").css({"color":"#fff"});

},function(){

	if(!($(this).find("a").attr('class')=='on')){
	$(this).find("a").css({"color":"#8EB136"});
	}else{
		$(this).find("a").css({"color":"#ff6600"});
	}
})


})