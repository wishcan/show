

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
 		// header( 'Content-Type:text/html;charset=utf-8 ');  
		date_default_timezone_set('PRC');
		isset($_FILES['Filedata'])?$filedata=$_FILES['Filedata']:$filedata=$_FILES['file'];
		//判断是否存在文件目录要是没有就创建
		is_dir($this->dir.'/temp')?'':mkdir($this->dir.'/temp',777);
		//修改文件的名字 
		$temp=$this->dir.'temp/'.$filedata['name'];

		$filedata['name']=date("Ymd").$filedata['name'];

		$this->dir=$this->dir.date('Ym').'/';

		$tmp_name=$filedata['tmp_name'];

		$file=$this->dir.$filedata['name'];

		$thumb=$this->dir.'small'.$filedata['name'];

		//按年月来创建文件目录
		is_dir($this->dir)? '' : mkdir($this->dir,777,true);	
		//文件存在则不进行生成
		if(file_exists($file)) die('文件已经存在');
		//庞大U呢是否存在
		$imgType=array('jpg','gif','png','jpeg');
		$info=pathinfo($file);
		if(in_array($info['extension'],$imgType))
		{
			$images=new Image();
			$images->param($filedata['tmp_name']);
			//if(!$images->thumb($file,600,500))die('图像上传失败！');
			$small=$images->thumb($thumb,300,200);
				
		}
		if(move_uploaded_file($filedata['tmp_name'],mb_convert_encoding($file,'UTF-8','auto')) && copy($small,$temp))
		{
			echo "上传成功";

		}else{
			die("上传失败");
		}

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
