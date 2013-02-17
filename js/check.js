$(function(){
	errorType=1;
	$("i") .hide();
	$("input").focus(function(){
		$(this).removeClass('inperror');
		$(this).next().next("p").hide();
	
	})
	/*
	显示错误信息
	参数1 表单输入项，2 错误P标签 3 错误信息
	*/
	function showError(element,error,num)
	{
		$(error).next("p").hide();
		$(element).addClass('inperror');
		$(error).css("display",'inline');
		$(".error"+num).show().siblings().hide();
		$(error+" i").show();
		errorType=0;
	}
	function showPass(num)
	{
		$(".pass").eq(num).prev("p").hide();
		$(".pass").eq(num).find("i").show();
		$(".pass").eq(num).css("display",'inline')
		$(".pass").eq(num).find("span").show();
	 	errorType=1;
	}
	/*
	 * 检查数据是否存在
	 * */
	function check(id,error,action)
	{
		$(id).blur(function(){
			var val=$(this).val()
				if(val == '') 
				{
					showError($(this),error,1) ;
				}else{
					
						$.get(
								'/showbl/index.php/Admin/'+action,
								{data:val},
								function(data){
									if(data==1){
										alert(data)
										showPass(0)
										errorType=1;
									}else{
										alert(data)
										showError($(this),error,2);
										errorType=0;
									}
									
								}
						);
				}
		
		})
	}
	check("#Category_cname",'.cate_error','Category/checkCname');
	check("#News_title",'.news_error','News/checkTitle');
	check("#Gallery_title",'.gallery_error','Gallery/checkTitle');
	check("#ArtersCategory_cname",'.ac_error','ArtersCategory/checkCname');
	check("#Arters_name",'.name_error','Arters/checkName');
	$("form").submit(function(){
			if(errorType){
				return true;
			}else{
				return false;
			}
		
		
	})
	
})