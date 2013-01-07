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
			array('type_id, recommendation', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('description', 'length', 'max'=>200),
			array('tag', 'length', 'max'=>20),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, title, description, type_id, recommendation, tag, createTime, updateTime', 'safe', 'on'=>'search'),
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
			'recommendation' => 'Recommendation',
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
		$criteria->compare('recommendation',$this->recommendation);
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
	public static function getData($gid,$start=0,$end=30)
	{
		if(!isset($gid))
		{
			return false;
		}
		$num=30;
		$limit=$start.', '.$end;
		$sql='select * from bl_gallery_data where gid in ('.$gid.') order by gdid limit '.$limit;
		$command=Yii::app()->controller->dbLink($sql);
		$row=$command->queryAll();
		return $row;
	}
	public static function getGallery($cid)
	{
		if(!isset($cid))return false;
		$model=Gallery::model()->findAll("cid=:cid order by gid",array(":cid"=>$cid));
		$gid='';
		foreach($model as $v){
			$gid.=','.$v->gid;
		}
		$gid=trim($gid,',');
		return $gid;
	}

	
}