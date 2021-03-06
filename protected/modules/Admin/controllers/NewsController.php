<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column_admin';

	/**
	 * @return array action filters
	 */




	public function actionIndex()
	{
		
		
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			
		));
	}


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
				'actions'=>array('index','view','upload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','checkTitle'),
				'users'=>array('*'),
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
		$model=new News;
		$data=new NewsData();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{

			$model->attributes=$_POST['News'];
			if($model->save())
			{

				$db=Yii::app()->db;
				$content="'".$_POST['News']['newsData']['content']."'";
				$nid=$model->id;
				$data->nid=$model->id;
				$data->content=$_POST['News']['newsData']['content'];
				if(isset($_POST['thumb']))
				{
					$thumb=date("ymd").$_POST['thumb'][0];
				}else{
					$thumb=' ';
				}
				$data->thumb=$thumb;
				$data->save();
				//$sql="insert into bl_news_data(nid,thumb,content)values(:nid,:thumb,:content)";
				//$command=$db->createCommand($sql);
				//$command->bindParam(":nid",$nid);
				
			//	$command->bindParam(":thumb",$thumb);
				//$command->bindParam(":content",$content);
				//$command->execute();
				$this->redirect(array('view','id'=>$model->id));
			}
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
		$data=$this->loadData($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			$data->content=$_POST['News']['newsData']['content'];
			if(isset($_POST['thumb']))
				{
					$thumb=date("ymd").$_POST['thumb'][0];
				}else{
					$thumb=' ';
				}
			$data->thumb=$thumb;
			if($model->save()){
				if($data->save())
				$this->redirect(array('view','id'=>$model->id));
				
				}

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

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{


		$model=new News('search');
		$model->unsetAttributes();  // clear any default values


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
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadData($nid)
	{
		$data=NewsData::model()->find('nid=:nid',array('nid'=>$nid));
		if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $data;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCheckTitle()
	{
		echo News::check($_GET['data']);
	} 

}
