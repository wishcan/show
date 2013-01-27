<?php

/**
 * This is the model class for table "bl_user".
 *
 * The followings are the available columns in table 'bl_user':
 * @property integer $id
 * @property string $sex
 * @property string $username
 * @property string $password
 * @property string $creatime
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
			array('username,password', 'required'),
			array('sex', 'length', 'max'=>3),
			array('username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>36),
			array('sex', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sex, username, password, creatime', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'sex' => '性别',
			'username' => '帐号',
			'password' => '密码',
			'creatime' => '创建时间',
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
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creatime',$this->creatime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	#md5加密密码
	public function encty($password)
	{
		return md5($password);
	}
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->username=trim($this->username);
			$this->password=$this->encty(trim($this->password));
			return true;
		}else
		{
			return false;
		}
	}
	public static function getUserName($uid){
		
		if($uid)
		{
			$model=self::modle()->findByPk($uid);
			return $model->username;
		}else{
			
			return '管理员';
		}
		
		
	} 
}