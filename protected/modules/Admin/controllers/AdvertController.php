<?php

class AdvertController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column_admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','createImg'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Advert;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Advert']))
		{
			$model->attributes=$_POST['Advert'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Advert']))
		{
			$model->attributes=$_POST['Advert'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Advert');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Advert('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Advert']))
			$model->attributes=$_GET['Advert'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Advert::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='advert-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCreateImg()
	{
		
		$aid=$_POST['aid'];

		$db=Yii::app()->db;
				$sql='insert into bl_advert_data(aid,thumb)value(:aid,:thumb)';
		$command=$db->createCommand($sql);
		$command->bindParam(":aid",$aid);
		foreach($_POST['thumb'] as $v)
		{
			$v=date("ymd").$v;
			$command->bindParam(":thumb",$v);
			$command->execute();
			$type=1;
		}
		if($type){
			echo $aid;
		}else{
			echo "系统出了点小问题，请重试";
		}

	}

	#显示广告信息
	public function actionEdit()
	{	


		$db=Yii::app()->db;
			if(isset($_GET['aid']))
			{
				$on='a.aid='.$_GET['aid'];
			}else{
				$on='a.aid=ad.aid ';
			}

		$sql="select ad.link, cid,a.title as guangao,ad.adid,ad.title,ad.thumb from bl_advert as a inner join bl_advert_data as ad on ".$on." order by a.aid";

		$command=$db->createCommand($sql);
		$row=$command->queryAll();
		foreach($row as $k=>$v)
		{
				
			$row[$k]['thumb']=parent::getImgDir($v['thumb']).$v['thumb'];	

		}
		if(isset($_GET['aid']))
		{
				$this->render('editImg',array('row'=>$row));
		}else
		{
			$this->render('edit',array('row'=>$row));
		}
	}



}
