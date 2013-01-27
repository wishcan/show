<?php
	/**
	 *广告处理action	
	*/
	class DisposeAction extends CAtion
	{
		$_data='';
		public function run()
		{
			$info=pathinfo($this->_data);
			$type=$info['extension'];
			switch ($type) {
				case 'swf':
					$this->_data=<<<here  somthing here;



					break;
				
				default:

					$this->_data='123';	
					# code...
					break;
			}
			return $this->_data;
		}	
	}




?>