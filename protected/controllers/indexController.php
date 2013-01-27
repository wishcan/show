<?php
 class indexController extends Controller
 {
 

 	public function actionIndex()
 	{
		/**
	 	 *	$news->新闻动态
	 	 *	$comment->评论
	 	 *	$study->度一学堂
	 	 *	$video->视频
	 	 *	$advert->顶部幻灯片
	 	 */
 		$news=self::getNews(27,10);
 		$comment=self::getNews(57,5);
 		$study=self::getNews(58,5);
 		// var_dump($comment);
 		$cate=self::getGalleryCate();
 		$video=Video::getData(0,6);
 		$video=$video['videos'];
 		$advert=Advert::model()->getAdverts(1);
 		$this->render("index",array('news'=>$news,'cate'=>$cate,'advert'=>$advert,'video'=>$video));

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
 	public function getNews($cid,$size)
 	{
 		/**
		 *$cid->栏目ID
		 *$size->读取数据条数		
 	 	 */
 		if(!isset($cid)) return false;
 		$criteria=new CDbCriteria();
 		$criteria->select='title,id,createTime';
 		$criteria->condition='cid=:cid';
 		$criteria->params=array(':cid'=>$cid);
 		$criteria->limit=$size;
 		$data = News::getData($criteria,$size,0);
 		$data = $data['news'];
 		return $data;
 	}






 }







?>