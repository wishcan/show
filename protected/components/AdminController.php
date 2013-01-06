<?php

class AdminController extends Controller
{


	protected  function beforeAction($action){

		if(strtolower(Yii::app()->user->name) =='guest' || !isset(Yii::app()->user->name))
		{
			$this->redirect(Yii::app()->createUrl('Admin/user/login'));
			return false;
		}else{
			return true;
		}



	}
}





?>