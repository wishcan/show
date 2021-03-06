<?php

class GalleryCategoryController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','addThumb','addDesc','del'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new GalleryCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryCategory']))
		{
			$model->attributes=$_POST['GalleryCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cateid));
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

		if(isset($_POST['GalleryCategory']))
		{
			$model->attributes=$_POST['GalleryCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cateid));
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
		$dataProvider=new CActiveDataProvider('GalleryCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(!isset($_GET['pid'])) die("请通过后台进入");

		$model=GalleryCategory::model()->findAll('pid=:pid',array(':pid'=>$_GET['pid']));
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
		$model=GalleryCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	//更改或者新建封面图片
	public  function actionAddThumb()
	{

		if(!isset($_POST['thumb']))
		{	
		   
		   		   die("系统出现故障，请联系技术员");

		}
		$data=array();
				$data['thumb']=$_POST['thumb'];
				$data['cid']=$_POST['cid'];
		//交给model来完成

		echo GalleryCategory::addThumb($data);
	}

	public function actionAddDesc()
	{
		if(!isset($_POST['desc']))

		{
			die("系统出现故障，请联系技术员");

		}

		$data=array();
				$data['desc']=$_POST['desc'];
				$data['gdid']=$_POST['gdid'];

		echo GalleryCategory::addDesc($data);		

	}
	public function actionDel()
	{
		if(!isset($_POST['gdid']))

		{
			die("系统出现故障，请联系技术员");

		}

		$data=array();
				$data['gdid']=$_POST['gdid'];

		echo GalleryCategory::del($data);		

	}

	// public function actionUpload($cid)
	// {
	// 	if(!isset($cid)) $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	// 	if(isset($_POST['thumb']))
	// 	{

		
	// 			$db=Yii::app()->db;
	// 			$sql="insert into bl_gallery_data(thumb,cid)values(:thumb,:cid)";
	// 			$command=$db->createCommand($sql);
	// 			$cid=$post['cid'];
	// 			$command->bindParam(":cid",$cid);
				
	// 			foreach ($_POST['thumb'] as $v)
	// 			 {
	// 				$v=date("ymd").$v;
	// 				$command->bindParam(":thumb",$v);
	// 				$command->execute();
	// 			}
	// 			$this->redirect(array('view','id'=>$cid));

	// 	}else{
	// 		$this->render('upload',array('cid'=>$cid,'cate'=>$cate));
	// 	}
	
	// }
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
