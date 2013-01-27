<?php

/**
 * This is the model class for table "bl_news".
 *
 * The followings are the available columns in table 'bl_news':
 * @property integer $id
 * @property integer $cid
 * @property string $title
 * @property string $decription
 * @property string $createTime
 * @property string $source
 * @property integer $bl_user_id
 * @property integer $click
 * @property integer $recomendation
 * @property string $tag
 * @property integer $updateTime
 * @property integer $type_id
 * @property integer $home_cate
 * @property integer $home_top
 * @property integer $children_top
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'bl_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('cid, bl_user_id, click, recomendation, updateTime, type_id, home_cate, home_top, children_top', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>30),
			array('decription', 'length', 'max'=>100),
			array('source', 'length', 'max'=>10),
			array('tag', 'length', 'max'=>20),
			array('id, cid, title, decription, createTime, source, bl_user_id, click, recomendation, tag, updateTime, type_id, home_cate, home_top, children_top', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, title, decription, createTime, source, bl_user_id, click, recomendation, tag, updateTime, type_id, home_cate, home_top, children_top', 'safe', 'on'=>'search'),
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
			"newsData"=>array(self::HAS_ONE,'NewsData','nid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cid' => '栏目',
			'title' => '标题',
			'decription' => '简介',
			'createTime' => '添加时间',
			'source' => '来源',
			'bl_user_id' => '作者',
			'click' => '点击数',
			'recomendation' => '推荐',
			'tag' => '标签',
			'updateTime' => '更新时间',
			'type_id' => '状态',
			'home_cate' => '首页置顶',
			'home_top' => '更新到首页',
			'children_top' => '分页置顶',
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
		if(isset($_GET['cid']))
		{
			$criteria->condition='cid=:cid';
			$criteria->params=array(":cid"=>$_GET['cid']);
		}
		if(isset($_GET['typeid']))
		{
			$criteria->condition='type_id=:typeid';
			$criteria->params=array(":typeid"=>$_GET['typeid']);
		}
		$criteria->compare('id',$this->id);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('decription',$this->decription,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('bl_user_id',$this->bl_user_id);
		$criteria->compare('click',$this->click);
		$criteria->compare('recomendation',$this->recomendation);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('updateTime',$this->updateTime);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('home_cate',$this->home_cate);
		$criteria->compare('home_top',$this->home_top);
		$criteria->compare('children_top',$this->children_top);

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
				$this->bl_user_id=Yii::app()->user->id;
				$this->cid=$_GET['cid'];
				

			}else
			{
				$this->updateTime=time();
			}
			return true;
		}else
		{
			return false;
		}
	}
<<<<<<< HEAD
   /**要求传入的参数为数组
	 *参数键名即条件
	 *值为条件要求值
	 *
	 * */
	public function getData($criteria,$pageSize=10,$openPage=1)
	{
		if($openPage){
		$count=News::model()->count($criteria);
		$pager=new CPagination($count);
		$pager->pageSize=$pageSize;
		$pager->applyLimit($criteria);
		$data['pager']=$pager;
		}
		$news=News::model()->findAll($criteria);
		$data['news']=$news;
		return $data;
	}

=======
	public static function check($data)
	{
		$model=self::model()->find('title=:title',array(':title'=>$data));
		if($model)
		{
			return 0;
		}else{
			return 1;
		}
	}
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba

}