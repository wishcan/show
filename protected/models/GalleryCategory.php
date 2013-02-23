<?php

/**
 * This is the model class for table "bl_gallery_category".
 *
 * The followings are the available columns in table 'bl_gallery_category':
 * @property integer $cateid
 * @property string $cname
 */
class GalleryCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryCategory the static model class
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
		return 'bl_gallery_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cname', 'required'),
			array('cateid', 'numerical', 'integerOnly'=>true),
			array('cname', 'length', 'max'=>10),
			array('cateid, cname, pid', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cateid, cname', 'safe', 'on'=>'search'),
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
			'Thumb'=>array(self::HAS_ONE,'GalleryThumb','cid'),
			'Data'=>array(self::HAS_MANY,'GalleryData','cateid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cateid' => 'ID',
			'cname' => '图册名',
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

		$criteria->compare('cateid',$this->cateid);
		$criteria->compare('cname',$this->cname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getCate($id=0,$chil=0)
	{
		if(!$chil)$model=GalleryCategory::model()->findAll('pid=:pid',array(':pid'=>$id));
		if($chil)$model=self::model()->findByPk($id);
		return $model;

	}
	public static function getCateid($pid=0)
	{
	
		$model=self::getCate($pid);
		$cid=array();
		foreach($model as $v)
		{
			$cid[]=$v->cateid;
		}	
		return $cid;
	}
 
	}

