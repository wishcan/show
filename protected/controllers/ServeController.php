<?php

class ServeController extends SController
{
	public function actionIndex()
	{

		$this->render('index');
	}
	public function actionIndexs()
	{
		$data= Dispose::advert(Yii::app()->baseUrl.'/upload/flash/sd_fw.swf',
						Yii::app()->createUrl('index'),
						array('htmlOptions'=>'style="height:450px"'));
		$this->render("indexs",array('data'=>$data));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}