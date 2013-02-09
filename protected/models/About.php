<?php

/**
 * This is the model class for table "bl_about".
 *
 * The followings are the available columns in table 'bl_about':
 * @property string $address
 * @property string $keywords
 * @property string $content
 * @property string $telephone
 * @property string $putNum
 * @property integer $id
 */
class About extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return About the static model class
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
		return 'bl_about';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, keywords, content, telephone, putNum', 'required'),
			array('address, keywords, content', 'length', 'max'=>500),
			array('telephone', 'length', 'max'=>15),
			array('putNum', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address, keywords, content, telephone, putNum, id', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'keywords' => 'Keywords',
			'content' => 'Content',
			'telephone' => 'Telephone',
			'putNum' => 'Put Num',
			'id' => 'ID',
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

		$criteria->compare('address',$this->address,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('putNum',$this->putNum,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}