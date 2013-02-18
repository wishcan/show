<?php

/**
 * This is the model class for table "bl_gallery_category".
 *
 * The followings are the available columns in table 'bl_gallery_category':
 * @property integer $cateid
 * @property string $cname
 */
class GalleryCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryCategory the static model class
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
		return 'bl_gallery_category';
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
			array('cateid', 'numerical', 'integerOnly'=>true),
			array('cname', 'length', 'max'=>10),
			array('cateid, cname, pid', 'safe'),
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
			'cateid' => 'ID',
			'cname' => '图册名',
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
	public static function getCate()
	{
		$model=GalleryCategory::model()->findAll('pid=0');
		return $model;

	}
	public static function addThumb($data)
	{
	
		if(empty($data)) die('数据不能为空,请重试');
		$sql='insert into bl_gallery_thumb(cateid,thumb)values(:cid,:thumb)';
		//查询是否存在数据 如果存在就不执行下一条
		$sql2='select tid from bl_gallery_thumb where cateid='.$data["cid"]. ' and thumb="'.$data['thumb'].'"';
		$command=MYS::dbLink($sql);
		$command2=MYS::dbLink($sql2);
		$command->bindParam(":cid",$data['cid']);
		$command->bindParam(":thumb",$data['thumb']);
		$row=$command2->execute();
		 if(!$row){
		 	//删除其他的记录再插入
		 	$sql3='delete form bl_gallery_thumb where cateid='.$data["cid"];
		 	$command3=MYS::dbLink($sql3);
		 	$command3->execute();
	        if($command->execute())
	        	{

	        		return 1;
	        	
	        	}else{
	        	
	        		return 2;
	        	}

	       }else{
	       	return 3;
	       }
	}



	public function addDesc($data)
	{

		if(empty($data)) die('数据不能为空,请重试');
		$sql='update bl_gallery_data set description="'.$data["desc"].'" where gdid='.$data['gdid'];
		//查询是否存在数据 如果存在就不执行下一条''
		//还需要优化，将所有的曾经的封面都可以给列出来
		$sql2='select gdid from bl_gallery_data where gdid='.$data['gdid'];
		$command=MYS::dbLink($sql);
		$command2=MYS::dbLink($sql2);
		$row=$command2->execute();
		 if(!$row){

		 	 	return 3;
	        
	       }else if($command->execute()){

	        		return 1;
	        	
	        	}else{
	        	
	        		return 2;
	        	}
	       }

	
	public function del($data)
	{
		if(empty($data)) die('数据不能为空,请重试');
		$sql='delete from bl_gallery_data  where gdid='.$data['gdid'];
		//查询是否存在数据 如果存在就不执行下一条''
		$sql2='select gdid from bl_gallery_data where gdid='.$data['gdid'];
		$command=MYS::dbLink($sql);
		$command2=MYS::dbLink($sql2);
		$row=$command2->execute();
		 if(!$row){

		 	 	return 3;
	        
	       }else if($command->execute()){

	        		return 1;
	        	
	        	}else{
	        	
	        		return 2;
	        	}
	    }
	}

