

<?php


class UploadController extends Controller
{

		public $dir;

		public function  __construct($dir='')
		{
			$this->param();
 		
		}
		public function param()
		{
			$this->dir=dirname(__FILE__).'/../../upload/';
			return $this->dir;
		}
		public function actionIndex(){

			// echo 1;
			// exit;
		}
		public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function actionAdd()
	{
	
 		isset($_FILES['Filedata'])?$filedata=$_FILES['Filedata']:$filedata=$_FILES['file'];
 		$up=new UploadFile;
 		$up->addTemp($filedata);
	}
	

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
			echo 'jh';
		}
	}

	
	public function actionDelete()
	{
		 $month=date("Ym");
		$fileName=$this->dir.$month.'/'.date("Ymd").$_POST['data'];
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
