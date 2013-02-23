<?php

class GalleryController extends Controller
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
				'actions'=>array('index','view','upload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','checkTitle','changeThumb','addDesc','del'),
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

			if(!isset($id)){
				$id=$_GET['id'];
			}
		$data=Gallery::getData($id,0,999);
		$this->render('view',array(
			'data'=>$data,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{	
		$model=new Gallery;
		$cate=GalleryCategory::model()->findAll();
		$type=1;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['thumb']))

		{
				$model->cid=$_GET['cid'];

				$cid=$_GET['cid'];

				$data=array();

				$GalleryData=new GalleryData();

				$UploadFile=new UploadFile();
				if($model->save())
				{
					$data['cid']=$cid;
					/**
					 *前提建立在于TEMP中有文件 不能在半道中将文件一走		
					 *	
					*/
					$files=$UploadFile->renameFile();
					$sql="insert into bl_gallery_data(thumb,cid,covert)values(:thumb,:cid,:covert)";

					$command=MYS::dbLink($sql);
					$command->bindParam(':cid',$cid);
					foreach($files as $k => $v)
					{	
						if($k==0 && is_null(GalleryData::model()->find('cid=:cid and covert=1',array(':cid'=>$cid))))
						{
							$covert=1;

						}else{	

							$covert=0;
						}
						$command->bindParam(':covert',$covert);
						
						$command->bindParam(':thumb',$v);
						$command->execute();
					}
					$type=0;
					$this->goView($model->cid);
				}
			
		}
		if($type){
			$this->render('create',array(
				'model'=>$model,
				'cate'=>$cate,
			));
	}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 public function goView($id)
	{
			if(!isset($id)){
				$id=$_GET['id'];
			}
		$data=Gallery::getData($id,0,999);
		$this->render('view',array(
			'data'=>$data,
		));
	 }
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['thumb']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
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
		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

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
		$model=Gallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
     *检查标题是否存在
	*/
	public function actionCheckTitle()
	{								
		echo Gallery::check($_GET['data']);
	}

	/**
 	 *修改图册封面	
	*/
	public function actionChangeThumb()
	{
		if(!$_POST['cid']){
				echo 4;
				return;}
		$data=array();
		$data=$_POST;
		echo Gallery::changeThumb($data);
	}

	/**
	 *添加备注
	*/
	public function actionAddDesc()
	{
		if(!$_POST['desc'])
		{
			echo 4;
			return;
		}	

		$data=array();
				$data['desc']=$_POST['desc'];
				$data['gdid']=$_POST['gdid'];
		echo Gallery::addDesc($data);		

	}


	public function actionDel()
	{

		if(!isset($_POST['gdid']))

		{
			die("系统出现故障，请联系技术员");

		}

				$data=array();
				$data['gdid']=$_POST['gdid'];

				echo Gallery::del($data);		

	}


	
}
