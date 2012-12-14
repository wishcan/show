<?php
 class indexController extends Controller
 {
 	// public $layouts=

 	public function actionIndex()
 	{
 		$model=Category::model()->findAll();
 	
 		$this->render("index",array("model"=>$model));

 	}






 }







?>