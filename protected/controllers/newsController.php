<?php
class newsController extends  Controller
{
	
	
	#默认显示页面
	public function actionIndex()
	{

		$this->render('index');
	}
	#内容显示页面
	public function actionNeiRong()
	{
		if(!isset($_GET['nid']))
		{
			echo "<script type='text/javascript'>alert('文章不存在')</script>";		
			$this->redirect(Yii::app()->controller->createUrl('index'));
		}else
		{
			$neirong=News::model()->findByPk($_GET['nid']);
			
		}
		
		
		$this->render('neiRong',array('neirong'=>$neirong));
	}
	
	
	
}






?>