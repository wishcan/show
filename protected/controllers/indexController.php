<?php
 class indexController extends Controller
 {
 
 	/**
 	 * $news为新闻动态
 	 * 
 	 */
 	public function actionIndex()
 	{
 		//$news=News::model()->findAll('cid=:cid order by createTime desc limit 10',array(":cid"=>'27'));
 		$news=News::model()->findAll(
 				array('select'=>'title,createTime,id',
 					  'order'=>'createTime desc',
 					  'limit'=>'10',
 					  'condition'=>'cid=:cid',
					   'params'=>array(':cid'=>'27'),	
 						));
 		$cate=self::getGalleryCate();	
 		$advert=Advert::model()->getAdverts(1);	
 		$this->render("index",array('news'=>$news,'cate'=>$cate,'advert'=>$advert));

 	}
 	public function actionError()
 	{
 		if($error=Yii::app()->errorHandler->error)
 		{
 			if(Yii::app()->request->isAjaxRequest)
 				echo $error['message'];
 			else
 				$this->render('error', $error);
 		}
 	}
 	public function actionShowCate(){
 		$this->layout='//';
 		$cate=self::getGalleryCate();
 		$this->render('showCate',array('cate'=>$cate));
 	}
 	public function getGalleryCate()
 	{
 		return Category::model()->getChilDren(23);
 	}






 }







?>