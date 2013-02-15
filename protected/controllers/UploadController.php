

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
			// switch ($_SERVER['SystemRoot']) {
			// 	case 'C:\Windows':
			// 		$this->dir=dirname(__FILE__).'/upload/';
			// 		return $this;
			// 		break;
			// 	default:
			// 		# code...
			// 		break;
			// }
		}
		public function actionIndex(){
			echo $this->dir;
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
 		/**
	     *æ–‡ä»¶æŒ‰å¹´æœˆæ—¥æ—¶åˆ†ç§’åŠ ä¸Šæœ¬æ¥çš„æ–‡ä»¶åè¿›è¡Œå‘½å
		 *uploadä¸‹çš„tempæ–‡ä»¶ä¸ºç¼“å­˜æ–‡ä»¶æ˜¾ç¤ºç¼©ç•¥å›¾ï¼Œä¸Šä¼ çš„æ—¶å€™å°†è¿™ä¸ªæ–‡ä»¶å¤¹æ¸…ç©º
		 *
		 */	
 		//$this->deleteTemp();
		date_default_timezone_set('PRC');
		$filedata=$_FILES['Filedata'];
		is_dir($this->dir.'/temp')?'':mkdir($this->dir.'/temp');
		$temp=$this->dir.'temp/'.$filedata['name'];
		$filedata['name']=date("Ymd").$filedata['name'];
		$this->dir=$this->dir.date('Ym').'/';
		$tmp_name=$filedata['tmp_name'];
		// $images=new image();
		// $images->param();
		$file=$this->dir.$filedata['name'];
		is_dir($this->dir)?'':mkdir($this->dir,777,true);	
		move_uploaded_file($filedata['tmp_name'],$file);
		copy($file,$temp);


	}
	/**
	 *åˆ é™¤ç¼“å­˜çš„å›¾ç‰‡æ–‡ä»¶	
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
			echo 'ç›®å½•ä¸å ­˜åœ¨';
		}
	}

	/**
	 *å¼‚æ­¥åˆ é™¤å›¾ç‰‡	
	*/
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
