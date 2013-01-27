<?php
 class indexController extends Controller
 {
 
 	/**
 	 * $news为新闻动态
 	 * 广告获取必须传入数组参数
 	 */
 	public function actionIndex()
 	{
 		$gg1=Dispose::advert('upload/flash/My_QHs_201301072022.swf');
 		$gg2=Dispose::advert('upload/flash/20130109094844365.swf','http://www.baidu.com',
 						array('class'=>'gg2',
 								'htmlOptions'=>'style="width:660px;height:48px;"'));
 		$gg3=Dispose::advert('images/index_b.png','',array('htmlOptions'=>'style="width:270px;height:48px;margin-left:10px;"'));
 		$this->render("index",array('gg1'=>$gg1,'gg2'=>$gg2,'gg3'=>$gg3));

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