<?php

/**
 * This is the model class for table "bl_arters_category".
 *
 * The followings are the available columns in table 'bl_arters_category':
 * @property integer $cateid
 * @property string $cname
 */
class ArtersCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArtersCategory the static model class
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
		return 'bl_arters_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cateid, cname', 'safe', 'on'=>'search'),
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
			'cname' => '分类名',
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
		$criteria->compare('cname',$this->cname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * 获取艺术分类的分类名；
	 * 如果传入ID的话就输出指定；
	 * 如果没有就输出一个LIST列表；
	 * */
	public function getCateName()
	{
		 if(!isset($_GET['cateid'])){		
		$model=self::model()->findAll();
		return CHml::listData($model,'cateid','cname');
		 }else
		 {
		 	$model=self::model()->findByPk("cateid=:cateid",array(":cateid"=>$_GET['cateid']));
		 	return $model->cname;
		 }
	}
	
}