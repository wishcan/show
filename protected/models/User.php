<?php

/**
 * This is the model class for table "bl_user".
 *
 * The followings are the available columns in table 'bl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $creatime
 * @property string $sex
 * @property integer $bl_role_rid
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
			array('sex, bl_role_rid', 'required'),
			array('bl_role_rid', 'numerical', 'integerOnly'=>true),
			array('username', 'length','message'=>'用户名不能为空' ,'max'=>20),
			array('password', 'length', 'message'=>'密码格式不正确' ,'max'=>36),
			array('sex', 'length', 'max'=>3),
			array('creatime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, creatime, sex, bl_role_rid', 'safe', 'on'=>'search'),
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
			'username' => '用户名',
			'password' => '密码',
			'creatime' => '创建时间',
			'sex' => '性别',
			'bl_role_rid' => '角色',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creatime',$this->creatime,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('bl_role_rid',$this->bl_role_rid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if(parent::beforeSave())
		{
				$this->username=trim($this->username);
				$this->password=md5(trim($this->password));
			return true;
		}else{
			return false;
		}
	}
<<<<<<< HEAD
	public static function getUserName($uid){
		
		if($uid)
		{
			$model=self::modle()->findByPk($uid);
			return $model->username;
		}else{
			
			return '管理员';
		}
		
		
	} 
=======
	public function validatePassword($password)
	{
		return $this->password === md5($password);

	}
	/*
	 *检查用户是否存在	
	*/
	public static function check($username)
	{
		$model=self::model()->find('username=:username',array(":username"=>$username));
		if(!$model)
		{
			return 1;
		}else{
			return 2;
		}

	}
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba
}