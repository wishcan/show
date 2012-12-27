<?php

/**
 * This is the model class for table "bl_arters_index".
 *
 * The followings are the available columns in table 'bl_arters_index':
 * @property integer $iid
 * @property integer $aid
 * @property string $createTime
 * @property integer $index
 */
class ArtersIndex extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArtersIndex the static model class
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
		return 'bl_arters_index';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aid, index', 'required'),
			array('aid, index', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iid, aid, createTime, index', 'safe', 'on'=>'search'),
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
			'iid' => 'Iid',
			'aid' => '艺术家',
			'createTime' => 'Create Time',
			'index' => '指数',
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

		$criteria->compare('iid',$this->iid);
		$criteria->compare('aid',$this->aid);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('index',$this->index);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}