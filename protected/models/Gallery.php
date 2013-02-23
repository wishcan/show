<?php

/**
 * This is the model class for table "bl_gallery".
 *
 * The followings are the available columns in table 'bl_gallery':
 * @property integer $gid
 * @property string $title
 * @property string $description
 * @property integer $type_id
 * @property integer $recommendation
 * @property string $tag
 * @property string $createTime
 * @property integer $updateTime
 *
 * The followings are the available model relations:
 * @property GalleryData[] $galleryDatas
 */
class Gallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bl_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, ', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('description', 'length', 'max'=>200),
			array('tag', 'length', 'max'=>20),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, title, description, type_id, tag, createTime, updateTime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'galleryDatas' => array(self::HAS_MANY, 'GalleryData', 'gid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'title' => '标题',
			'description' => '简介',
			'type_id' => '状态',
			'tag' => 'Tag',
			'createTime' => '添加时间',
			'updateTime' => '更新时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('gid',$this->gid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type_id',$this->type_id);
	
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->uid=Yii::app()->user->id;
				$this->cid=$_GET['cid'];	
			}else{
				$this->updateTime=date('Y-m-d h:i:s');
			}
				return true;
		}else
		{
			return false;
		}
	}

	//$num获取的数量为30张
	public static function getData($cid,$start=0,$end=30)
	{
		if(!isset($cid))
		{
			return false;
		}
		$num=30;
		$limit=$start.', '.$end;
		$sql='select * from bl_gallery_data where cid in ('.$cid.') order by gdid limit '.$limit;
		$command=Yii::app()->controller->dbLink($sql);
		$row=$command->queryAll();
		return $row;
	}
	public static function getGallery($cid)
	{
		if(!isset($cid))return false;
		$model=Gallery::model()->findAll("cid=:cid order by gid",array(":cid"=>$cid));
		return $model;
	}

	

	public static function check($title)
	{
		$model=self::model()->find('title=:title',array(':title'=>$title));
		if($model)
		{
			return 0;
		}else{
			return 1;
		}
	}


	/**
	 *修改图册的封面
	 *@param $cid 图册的ID
	 *@param $gdid 图片的ID
	 *@param $cover 封面的字段 默认为1 即为 设为封面
	*/


	public  static function changeThumb($data,$covert=1)
	{
		$cid=$data['cid'];
		$gdid=$data['gdid'];

		$sql1='update bl_gallery_data set covert=0 where cid=:cid and covert =1';
		$sql2='update bl_gallery_data set covert=:covert where gdid=:gdid';
		$command1=MYS::dbLink($sql1);
		$command1->bindParam(':cid',$cid);
		$command1->execute();
		$command2=MYS::dbLink($sql2);
		if($gdid){
			$command2->bindParam(':gdid',$gdid);
			$command2->bindParam(':covert',$covert);
			if($command2->execute())
			{

				return  1;

			}else{
				return 2;
			}
		}
	}


		public function addDesc($data)
	{

		if(empty($data)) die('数据不能为空,请重试');
		$sql='update bl_gallery_data set description="'.$data["desc"].'" where gdid='.$data['gdid'];
		//查询是否存在数据 如果存在就不执行下一条''
		//还需要优化，将所有的曾经的封面都可以给列出来
		$sql2='select gdid from bl_gallery_data where gdid='.$data['gdid'];
		$command=MYS::dbLink($sql);
		$command2=MYS::dbLink($sql2);
		$row=$command2->execute();
		 if(!$row){

		 	 	return 3;
	        
	       }else if($command->execute()){

	        		return 1;
	        	
	        	}else{
	        	
	        		return 2;
	        	}
	       }

	 public function del($data)
	{
		if(empty($data)) die('数据不能为空,请重试');
		$sql1='select gdid from bl_gallery_data where gdid='.$data['gdid'];
		$sql2='delete from bl_gallery_data  where gdid='.$data['gdid'];
		//查询是否存在数据 如果存在就不执行下一条''
		$command1=MYS::dbLink($sql1);
		$command2=MYS::dbLink($sql2);
		$row=$command1->execute();
		 if(!$row){

		 	 	return 3;
	        
	       }else if($command2->execute()){

	        		return 1;
	        	
	        	}else{
	        	
	        		return 2;
	        	}
	    } 

}