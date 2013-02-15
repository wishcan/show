<?php
/**公司概况*/

/*公司信息和加入我们页面的信息都可通过后台更改*/

class AboutController extends SController
{
	
	public function actionIndex()
	{
		$row=News::model()->findByPk(3);
		if(is_null($row)) new CHttpException(404,'没有文章！');
		$this->render('index',array('row'=>$row));
	}
	public function actionJoin()
	{

		$row=News::model()->findByPk(3);
		$this->render('join',array('row'=>$row));
	}
	public function actionConact()
	{
		$row=About::model()->findByPk(1);
		$this->render('conact',array('row'=>$row));
	}
	public function actionContent()
	{

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