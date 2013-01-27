<?php

class DefaultController extends AdminController
{
	public $layout='/layouts/column_admin';
	public function actionIndex()
	{
			
                $this->render('index');
	
	}
}