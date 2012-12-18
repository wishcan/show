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
 				
 		$this->render("index",array('news'=>$news));

 	}






 }







?>