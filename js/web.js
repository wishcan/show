$(function(){


$("#menu li").hover(function(){
	
// if($(this).index()!==2 || $(this).index()!==3 ||$(this).index()!==8) {
// 	alert($(this).index()) ;
$(this).addClass('lion').siblings().removeClass('lion');
	if(!($(this).index()==2 || $(this).index()==3 || $(this).index()==8 ))$('.fenlei').slideUp(200);

	
})
function showFen(element,show){
 th=5;

$(element).hover(function(){
	
	switch($(this).index()){
		case 2:
		$(this).css({'z-index':10});
		th=0;
		break;
		case 8:
		$(this).css({'z-index':10});
		th=1;
		break;
		case 3:
		$(this).css({'z-index':10});
		th=2;
		break;
		default:
		$('.fenlei').slideUp(200);
		break;
	}
	$('.fenlei').slideUp(200);
		$('.fenlei').eq(th).slideDown(200);

	// alert(th.index());
},function(){

	if(!($(this).find("a").attr('class')=='on')){
	}else{
		$(this).find("a").css({"color":"#ff6600"});
	}
})
	show.hover(function(){
	element.addClass('lion');
})
	$('.fenlei').mouseleave(function(){
	 $(this).slideUp(200);
	element.removeClass('lion');
})


}
showFen($('#menu li').eq(2),$('.fen'));
showFen($('#menu li').eq(8),$('.about'));
showFen($('#menu li').eq(3),$('.sfenlei'));

})