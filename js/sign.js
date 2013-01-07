$(function(){
	errorType=1;
$("input").focus(function(){
	$(this).removeClass('inperror');
	$(this).next().next("p").hide();
})
/*
显示错误信息
*/
function showError(element,error,num)
{
	$(error).next("p").hide();

	$(element).addClass('inperror');
	$(error).css("display",'inline');
	$(".error"+num).show().siblings().hide();
	$(error+" i").css("display",'inline-block');
	errorType=0;
}
function showPass(num)
{
	$(".pass").eq(num).prev("p").hide();
	$(".pass").eq(num).css("display",'inline')
	$(".pass").eq(num).find("span").show();
 	errorType=1;
}
/************用户名验证************/
$("#User_username").blur(function(){

		val=$(this).val().length;
		data=$(this).val();
		th=$(this);
			if(val == '')
			{
					showError($(this),".user_error",0);

			}else if(val<5 || val>20)
			{
				
					showError($(this),".user_error",2);
					
			}else
			{
					$.post(
							'/show/index.php?r=Admin/user/checkUsername',	
							{username:data},
							function(data)
							{
								switch(parseInt(data))
								{
									case 1:
									showPass(0);
									break;
									case 2:
									showError($(th),".user_error",1);
									break;
									default:
									break;
								}
								
							}	
						);

			}
})
/***********用户名验证结束********/
/************密码验证************/
	$("#User_password").blur(function(){
		if($(this).val() == '')
		{
			showError($(this),'.pwd_error',3);
		}else if( $(this).val().length<6 ||  $(this).val().length>20)
		{
				showError($(this),'.pwd_error',4);	
		}else{
			showPass(1);
		}
	})
/**********重复验证密码**************/	
	$(".passwordc").blur(function(){
		if($(this).val()==$("#User_password").val() && $("#User_password").val()!=='' )
		{
			showPass(2);
		}else if($("#User_password").val()==''){
			showError($(this),'.pwd_error',3);
		}else if($(this).val()!==$("#User_password").val())
		{
			showError($(this),'.rpwd_error',5);
		}
	})
/**********验证密码结束**************/	
/****************邮箱验证***************/
	$(".email").blur(function(){
				//	 /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
			var reg = /^[a-zA-Z0-9]\w+@{1}[a-zA-Z0-9]+\.(com|cc|cn|org|net|cn|com.cn)$/;
			var val=$(this).val();
			if(val!==''){
			if(!(reg.test(val))){
				error=0
				$(this).next("span").find(".error2").show();
			}
			}
	})


/**************完成注册*****************/
$("form").submit(function(){
	if( $("#User_username").val()!=='' && $('#User_username').val().length>=6 && $('#User_username').val().length<=20 && $("#User_password").val()!=='' && $("#User_password").val().length>=6 && $("#User_password").val().length<=20 && $(".passwordc").val() == $("#User_password").val()){


		errorType=1;
	}else{
		alert($("#User_username").val()+"==="+$("#User_password").val()+"====="+$(".passwordc").val());
		errorType=0;
	}
	if(errorType){
	return true;
	}else{

	return true;
}
})

})