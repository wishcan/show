<?php

/**
 * This is the model class for table "bl_arters".
 *
 * The followings are the available columns in table 'bl_arters':
 * @property integer $aid
 * @property string $name
 * @property string $sex
 * @property integer $click
 * @property string $description
 * @property string $birthDay
 * @property integer $bl_arters_category_cateid
 * @property string $tags
 * @property string $district
 * @property string $country
 */
class Arters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Arters the static model class
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
		return 'bl_arters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sex,name,description,bl_arters_category_cateid', 'required'),
			array('aid, click, bl_arters_category_cateid', 'numerical', 'integerOnly'=>true),
			array('name, country', 'length', 'max'=>45),
			array('sex', 'length', 'max'=>3),
			array('description', 'length', 'max'=>300),
			array('birthDay', 'length', 'max'=>10),
			array('tags', 'length', 'max'=>100),
			array('district', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aid, name, sex, click, description, birthDay, bl_arters_category_cateid, tags, district, country', 'safe', 'on'=>'search'),
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
// 				'artersIndex'=>array(self::HAS_MANY,),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aid' => '主键',
			'name' => '姓名',
			'sex' => '性别',
			'click' => '关注',
			'description' => '简介',
			'birthDay' => '生日',
			'bl_arters_category_cateid' => '分类',
			'tags' => '标签',
			'district' => '国家',
			'country' => '城市',
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

		$criteria->compare('aid',$this->aid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('click',$this->click);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('birthDay',$this->birthDay,true);
		$criteria->compare('bl_arters_category_cateid',$this->bl_arters_category_cateid);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*
	 * 获取艺术家的名字如果指定了aid的话就返回指定的的艺术家名
	 * 如果没有就返回一个数组下拉框
	 */
	public static  function getArtName($aid=0)
	{
		if($aid)
		{
			$model=Arters::model()->findByPk($aid);
			return $model->name;
		}else{
			$model=Arters::model()->findAll();
			return CHtml::listData($model,'aid','name');
		}
	}
	public static function getSex()
	{
		$array=array('1'=>'男','2'=>'女');
		return $array;
	}
	
}