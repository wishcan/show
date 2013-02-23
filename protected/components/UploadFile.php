<?php

class UploadFile
{

	private $dir;//上传目录
	private $temp;//上传缓存目录
	private $UploadDir;//最终上传目录
	const UNDFIND='找不到文件目录';


 	public 	function __construct($dir=null,$temp=null,$UploadDir=null)
	{
		$this->param($dir,$temp,$UploadDir);
		is_dir($this->UploadDir)?'':$this->mkdirs($this->UploadDir);
		is_dir($this->temp)?'':$this->mkdirs($this->temp);
		
	}	

	/** 
     *设置上传文件目录
	 *
	*/

	public 	function param($dir,$temp,$UploadDir)
	{
		!is_null($dir)?$this->dir=$dir:$this->dir=dirname(__FILE__).'/../../upload';
		!is_null($temp)?$this->temp=$temp:$this->temp=$this->dir.'/temp'.'/';
		!is_null($UploadDir)?$this->UploadDir=$UploadDir:$this->UploadDir=$this->dir.'/'.date("Y").'/'.date("m").'/'.date("d").'/';
		return $this;
	}

	/** 
     *addTemp 将上传文件移动到temp中
	 *
	*/


	public function addTemp($filedata)
	{
		//判断是否存在文件目录要是没有就创建
		// is_dir($this->temp)?'':mkdir($this->temp,777);
		$info=pathinfo($filedata['name']);
		$fileName=date("Ymdhis").mt_rand(1000,10000).'.'.$info['extension'];
		$fileName=$this->temp.$fileName;
		move_uploaded_file($filedata['tmp_name'], $fileName);
	}	

	
	/**
	 *创建文件目录
	 *来自网络
	*/
	public function mkdirs($path, $mode = 0777) //creates directory tree recursively 
	{ 

		 // !is_dir($this->dir.'/'.date("Y"))?mkdir($this->dir.'/'.date("Y")):!is_dir($this->dir.'/'.date("Y").'/'.date("m"))?mkdir($this->dir.'/'.date("Y").'/'.date("m")):!is_dir($this->dir.'/'.date("Y").'/'.date("m").'/'.date('d'))?mkdir($this->dir.'/'.date("Y").'/'.date("m").'/'.date('d')):'';
		$dirs = explode('/',$path); 
		$pos = strrpos($path, "."); 
		if ($pos === false) { // note: three equal signs 
		// not found, means path ends in a dir not file 
		$subamount=0; 
		} 
		else { 
		$subamount=1; 
		} 

		for ($c=0;$c < count($dirs) - $subamount; $c++) { 
		$thispath=""; 
		for ($cc=0; $cc <= $c; $cc++) 
		{ 
			$thispath.=$dirs[$cc].'/'; 
			
		} 

		if (($thispath!=='/') && !is_dir($thispath)) { 

		mkdir($thispath,$mode); 
		} 
		}
		
	}
	/**
	 *移动文件
	*/
	public function renameFile()
	{

		if(!is_dir($this->temp)) die(self::UNDFIND);
		$images=new Image();
		$files=array();

			foreach (scandir($this->temp) as $k=>$v) {
					# code...

					if(file_exists($this->temp.$v) && $v!=='.' && $v!=='..')
					{
							if(!file_exists($this->UploadDir.$v)){

								rename($this->temp.$v,$this->UploadDir.$v);
									$thumb=$this->UploadDir.'/small/';
									
									if(!is_dir($thumb)) mkdir($thumb);
										$images->param($this->UploadDir.$v);
										$images->thumb($thumb.$v,300,200);		
										$files[]=$v;

							}

							
					}
			

			}
			return $files;


	}
 public function getDir($thumb)
 {
 	$dir=Yii::app()->baseUrl.'/upload'.'/'.substr($thumb, 0,4).'/'.substr($thumb,4,2).'/'.substr($thumb,6,2).'/';
 	return $dir;
 }


}






?>