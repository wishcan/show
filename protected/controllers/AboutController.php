<?php
/**公司概况*/
class AboutController extends Controller
{
	public $layout='//layouts/column_sd';
	public function actionIndex()
	{
		$row=News::model()->findByPk(3);
		$this->render('index',array('row'=>$row));
	}
	public function actionJoin()
	{
		$this->render('join');
	}
	public function actionConact()
	{
		$row=About::model()->findByPk(1);
		$this->render('conact',array('row'=>$row));
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