<?php

/**
 * This is the model class for table "bl_video".
 *
 * The followings are the available columns in table 'bl_video':
 * @property integer $id
 * @property string $title
 * @property string $createTime
 * @property string $thumb
 * @property string $tag
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
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
		return 'bl_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, thumb', 'length', 'max'=>45),
			array('tag', 'length', 'max'=>20),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, createTime, thumb, tag', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => '标题',
			'createTime' => '添加时间',
			'thumb' => '地址',
			'tag' => '标签',	
			'description'=>'简介'	
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('tag',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}