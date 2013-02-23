<?php

/**
 * This is the model class for table "bl_gallery_data".
 *
 * The followings are the available columns in table 'bl_gallery_data':
 * @property string $thumb
 * @property string $title
 * @property integer $cid
 * @property integer $gdid
 * @property string $desc
 */
class GalleryData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryData the static model class
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
		return 'bl_gallery_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid', 'required'),
			array('cid', 'numerical', 'integerOnly'=>true),
			array('thumb', 'length', 'max'=>400),
			array('title', 'length', 'max'=>20),
			array('description', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('thumb, title, cid, gdid, description', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'thumb' => 'Thumb',
			'title' => 'Title',
			'cid' => 'Cid',
			'gdid' => 'Gdid',
			'description' => 'description',

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

		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('gdid',$this->gdid);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getData($cid)
	{
		if(!$cid) return false;
		return self::model()->findAll("cid=:cid",array("cid"=>$cid));


	}
	public static function getThumb($cid,$covert=1)
	{

		if(!$cid) return false;
		return self::model()->find('cid=:cid and covert=:covert',array(':cid'=>$cid,':covert'=>$covert));
	}
}