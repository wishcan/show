<?php

/**
 * This is the model class for table "bl_user".
 *
 * The followings are the available columns in table 'bl_user':
 * @property string $sex
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $creatime
 * @property integer $rid
 * @property integer $phone
 * @property string $email
 * @property string $updateTime
 *
 * The followings are the available model relations:
 * @property Video[] $videos
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'bl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,password,phone, email', 'required'),
			array('rid, phone', 'numerical', 'integerOnly'=>true),
			array('sex', 'length', 'max'=>3),
			array('username, email', 'length', 'max'=>20),
			array('password', 'length', 'max'=>36),
			array('rid,sex,updateTime,rid,sex', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sex, id, username, password, creatime, rid, phone, email, updateTime', 'safe', 'on'=>'search'),
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
			'videos' => array(self::HAS_MANY, 'Video', 'bl_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sex' => '性别',
			'id' => 'ID',
			'username' => '账户名',
			'password' => '密码',
			'creatime' => 'Creatime',
			'phone' => '手机号',
			'email' => '邮箱',
			'updateTime' => 'Update Time',
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

		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creatime',$this->creatime,true);
		$criteria->compare('rid',$this->rid);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('updateTime',$this->updateTime,true);

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

			}else
			{
				$this->updateTime=date('Y-m-d h:i:s');
			}
			return true;
		}else
		{
			return false;
		}
	}
}