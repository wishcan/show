<?php

/**
 * This is the model class for table "bl_gallery_thumb".
 *
 * The followings are the available columns in table 'bl_gallery_thumb':
 * @property integer $cateid
 * @property integer $tid
 * @property string $thumb
 */
class GalleryThumb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryThumb the static model class
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
		return 'bl_gallery_thumb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cateid, thumb', 'required'),
			array('cateid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cateid, tid, thumb', 'safe', 'on'=>'search'),
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
			'cateid' => 'Cateid',
			'tid' => 'Tid',
			'thumb' => 'Thumb',
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
		$criteria->compare('tid',$this->tid);
		$criteria->compare('thumb',$this->thumb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getThumb($cid)
	{
		if(!$cid) return false;


		return self::model()->find('cateid=:cid',array(':cid'=>$cid));
	}
}