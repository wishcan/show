<?php
class newsController extends  Controller
{
	
	
	#默认显示页面
	public function actionIndex()
	{
		$this->render('news');
	}
	#内容显示页面
	public function actionNeirong()
	{
		
		
		
		$this->render('neirong');
	}
	
	
	
}






?>