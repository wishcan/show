<?php

/**
 * This is the model class for table "bl_opus".
 *
 * The followings are the available columns in table 'bl_opus':
 * @property integer $oid
 * @property string $thumb
 * @property string $opuName
 * @property string $creatTime
 * @property string $pubName
 */
class Opus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Opus the static model class
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
		return 'bl_opus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('thumb', 'length', 'max'=>45),
			array('opuName', 'length', 'max'=>20),
			array('pubName', 'length', 'max'=>100),
			array('creatTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('oid, thumb, opuName, creatTime, pubName', 'safe', 'on'=>'search'),
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
			'oid' => 'Oid',
			'thumb' => '缩略图',
			'opuName' => '作品名',
			'creatTime' => '出版时间',
			'pubName' => '出版社',
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

		$criteria->compare('oid',$this->oid);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('opuName',$this->opuName,true);
		$criteria->compare('creatTime',$this->creatTime,true);
		$criteria->compare('pubName',$this->pubName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave()
	{
		if(parent::beforeSave())
		{	
			$this->opuName=trim($this->opuName);
			$this->pubName=trim($this->pubName);
			if($this->isNewRecord)
			{

				$this->thumb=$_POST['thumb'][0];
				if($_POST['Opus']['creatTime']==''){
					$this->createTime=time('y-m-d');
				}
			}
			return true;
		}else{
			return false;
		}

	}
}