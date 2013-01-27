<?php
class newsController extends  Controller
{
	
	
	#默认显示页面
	public function actionIndex()
	{
		$criteria=new CDbCriteria();
		$criteria->order='createTime desc';
		$criteria->condition='cid=:cid';
		$criteria->params=array(':cid'=>27);
		// Yii::app()->cache->set(1,,60);
		$data=News::getData($criteria);
		$this->render('news',array('pages'=>$data['pager'],'news'=>$data['news']));

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
	public function actionDuyi()
	{
		isset($_GET['cid'])?$cid=$_GET['cid']:$cid=57;
		$criteria=new CDbCriteria();
		$criteria->order='createTime desc';
		$criteria->condition='cid = :cid';		
		$criteria->params=array(':cid'=>$cid);
		$data=News::getData($criteria,5);
		$this->render('duyi',array('pages'=>$data['pager'],'news'=>$data['news']));
		
	}
	public function actionPinglun()
	{
		isset($_GET['cid'])?$cid=$_GET['cid']:$cid=58;
		$criteria=new CDbCriteria();
		$criteria->order='createTime desc';
		$criteria->condition='cid = :cid';
		$criteria->params=array(':cid'=>$cid);
		$data=News::getData($criteria,5);
		$this->render('pinglun',array('pages'=>$data['pager'],'news'=>$data['news']));
		
		
	}
	
	
	
}






?>