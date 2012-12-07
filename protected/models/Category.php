<?php

/**
 * This is the model class for table "bl_category".
 *
 * The followings are the available columns in table 'bl_category':
 * @property integer $cid
 * @property string $cname
 * @property integer $pid
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
               
		return 'bl_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cname', 'required'),
			array('cname', 'length', 'max'=>20),
			array('id, cname, pid,type', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cname, pid,type', 'safe', 'on'=>'search'),
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
			'children'=>array(self::HAS_MANY,'category','pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'cname' => '栏目名称',
			'pid' => '上级栏目',
			'type'=>'栏目类分类',
		);
	}
	public function p($val)
	{
		echo "<pre>";
		print_r($val);
		echo "</pre>";
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
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('pid',$this->pid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*
	获得栏目的名称
	*/
	public function getCateName($cid)
	{
		if(!isset($cid))
		{
			return ;
		}else
		{
			$model=self::model()->findByPk($cid);
			if(!empty($model))
			return  $model->cname;

		}



	}

	/**
	 *无限分级原理
	 *先获得最顶级的栏目名称
	 *	然后循环他的子集输出子集的栏目名称
	 *如果子集还有子集的话继续 如果没有就走下面的
	*/
	public static function getInfo()
	{
		$data=array();
		$models=self::model()->findAll();
		foreach ($models as $v) {
			# code...
			if(!array_key_exists($v->id, $data))
			     $data[$v->id]=$v->cname;

			self::appendChildren($data,$v);
		}
	//	exit;
		return $data;
		
	}
	public static function appendChildren(&$data,$model,$path=5)
	{

		foreach ($model->children as $m) {
			$cname='乚'.$m->cname;
			$cname=str_pad($cname,strlen($m->cname)+$path,'-',STR_PAD_LEFT);
			if(!array_key_exists($m->id, $data))	
			$data[$m->id]=$cname;
			self::appendChildren($data,$m,$path+2);
			# code...
		
		}

	}
	public static function getCateList($id=0)
	{
		$data=array();
	
		$model=Category::model()->findAll('pid=:id',array(":id"=>$id));
			
		foreach ($model as $v) {

			$list['text']=CHtml::link($v->cname,array('news/create','cid'=>$v->id),array('target'=>'con','class'=>'treea'));
			$list['children']=Category::model()->getCateList($v->id);
			$data[]=$list;
			
		}
		
		return $data;
	}



}