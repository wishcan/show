<?php

class videoController extends Controller
{
	public function actionIndex()
	{
		$data=video::getData(0,20);
		$this->render('index',array('pages'=>$data['pager'],'data'=>$data['videos']));
		
	}
	public function actionKankan()
	{
		if(!isset($_GET['vid'])){
			return false;
		}else{
			$data= Video::getData($_GET['vid']);
			$this->render('kankan',array('data'=>$data));
		}
	}
	
	
	
}




?>