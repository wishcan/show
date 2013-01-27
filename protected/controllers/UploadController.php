<?php


class UploadController extends Controller
{

	public $dir='C:/wamp/www/show/upload/';

		public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function actionIndex()
	{
		
		$this->render("index");
	}
	public function actionAdd()
	{
 		/**
	     *文件按年月日时分秒加上本来的文件名进行命名
		 *upload下的temp文件为缓存文件显示缩略图，上传的时候将这个文件夹清空
		 *
		 */	
 		$this->deleteTemp();
		date_default_timezone_set('PRC');
		$filedata=$_FILES['Filedata'];
		$temp=$this->dir.'temp/'.$filedata['name'];
		$filedata['name']=date("ymd").$filedata['name'];
		$this->dir=$this->dir.date('ym').'/';
		$tmp_name=$filedata['tmp_name'];
		$file=$this->dir.$filedata['name'];
		is_dir($this->dir)?'':mkdir($this->dir);	
		move_uploaded_file($filedata['tmp_name'],$file);
		copy($file,$temp);


	}
	/**
	 *删除缓存的图片文件	
	*/

		public function deleteTemp()
	{
		$dir=$this->dir.'temp';

		if(is_dir($dir))
		{
			foreach (scandir($dir) as $v) {
					# code...
					
					if(file_exists($dir.'/'.$v) && $v!=='.'&&$v!=='..' )
					{
						if(time()-filectime($dir.'/'.$v)>3600) @unlink($dir.'/'.$v);
						
					}
			}
		}else{		
			echo '目录不存在';
		}
	}

	/**
	 *异步删除图片	
	*/
	public function actionDelete()
	{
		 $month=date("ym");
		$fileName=$this->dir.$month.'/'.date("ymd").$_POST['data'];
		if(file_exists($fileName))
		{

		 	if(unlink($fileName)){
				if(unlink($this->dir.'/temp/'.$_POST['data']))
				{
					echo 1;
				}
			}
		}else{
			echo 0;
		}


	}




}






?>