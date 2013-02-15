<?php

class CommentController extends SController
{
	
	public function actionIndex()
	{
		$criteria=new CDbCriteria();
		$criteria->order='createTime desc';
		$criteria->condition='cid=:cid';
		$criteria->params=array(':cid'=>3);
		// Yii::app()->cache->set(1,,60);
		$row=News::getData($criteria,11);
			if(empty($row['news'])) throw new CHttpException(404,'没有文章！');
		$this->render('index',array('pages'=>$row['pager'],'news'=>$row['news']));
	}

	public function actionContent()
	{
		if(!isset($_GET['nid']))
		{
			throw new CHttpException(404,'找不到您所要查看的页面,请查看其他页面！');
		}
		$row=News::model()->findByPk($_GET['nid']);
		$this->render('content',array('row'=>$row));
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