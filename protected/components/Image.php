<!-- 一个我经常使用的图片处理类，很好用的。给大家推荐一下！主要包括图片的裁剪，缩放，加水印等。下面是一些简单的使用方法。
include("imageclass.php");			//这里注意imageclass.php的路径
$imgs=new image();
$imgs->param($tempFile);
if(!$imgs->thumb($targetFile,600,500))die('图像上传失败！');		//对图片进行缩放

$imgs->water($targetFile,$water,$pos=0,$pct=50);主要包括两个参数，$targetFile为已经上传到服务器的文件路径，$water为水印图片,$pos为水印图片位置，$pct为透明度；
$pos位置说明：
0://随机
1://1为顶端居左
2://2为顶端居中
3://3为顶端居右
4://4为中部居左
5://5为中部居中
6://6为中部居右
7://7为底端居左
8://8为底端居中
9://9为底端居右


将//里边的内容保存在imageclass.php里边，就可以调用了。 -->
<!-- /////////////////////////////////////////////////////////////// -->
<?php
/* +-------------------------------------------------------------+
* | Copyright (c) 2008-2009 Diqiye.Com All rights reserved.
* +-------------------------------------------------------------+
* | Info : 图像处理类
* +-------------------------------------------------------------+
*/
class image {
        // 当前图片
        protected $img;
        // 图像types 对应表
        protected $types = array(
                        1 => 'gif',
                        2 => 'jpg',
                        3 => 'png',
                        6 => 'bmp'
                    );

        // image
        public function __construct($img=''){
                !$img && $this->param($img);
        }

        // Info
        public function param($img){
                $this->img = $img;
                return $this;
        }

        // imageInfo
        public function getImageInfo($img){
                $info = @getimagesize($img);
                if(isset($this->types[$info[2]])){
                        $info['ext'] = $info['type'] = $this->types[$info[2]];
                } else{
                        $info['ext'] = $info['type'] = 'jpg';
                }
                $info['type'] == 'jpg' && $info['type'] = 'jpeg';
                $info['size'] = @filesize($img);
                return $info;
        }

        // thumb(新图地址, 宽, 高, 裁剪, 允许放大)
        public function thumb($filename,$new_w=160,$new_h=120,$cut=0,$big=0){
        
        // 获取原图信息
        $info  = $this->getImageInfo($this->img);
        if(!empty($info[0])) {
            $old_w  = $info[0];
            $old_h  = $info[1];
            $type   = $info['type'];
            $ext    = $info['ext'];
            unset($info);
            // 如果原图比缩略图小 并且不允许放大
            if($old_w < $new_h && $old_h < $new_w && !$big){
                    return false;
            }
            // 裁剪图片
            if($cut == 0){ // 等比列
                    $scale = min($new_w/$old_w, $new_h/$old_h); // 计算缩放比例
                    $width  = (int)($old_w*$scale); // 缩略图尺寸
                    $height = (int)($old_h*$scale);
                    $start_w = $start_h = 0;
                    $end_w = $old_w;
                    $end_h = $old_h;
            } elseif($cut == 1){ // center center 裁剪
                        $scale1 = round($new_w/$new_h,2);
                        $scale2 = round($old_w/$old_h,2);
                        if($scale1 > $scale2){
                                $end_h = round($old_w/$scale1,2);
                                $start_h = ($old_h-$end_h)/2;
                                $start_w  = 0;
                                $end_w    = $old_w;
                        } else{
                                $end_w  = round($old_h*$scale1,2);
                                $start_w  = ($old_w-$end_w)/2;
                                $start_h = 0;
                                $end_h   = $old_h;
                        }
                        $width = $new_w;
                    $height= $new_h;
                } elseif($cut == 2){ // left top 裁剪
                        $scale1 = round($new_w/$new_h,2);
                    $scale2 = round($old_w/$old_h,2);
                    if($scale1 > $scale2){
                            $end_h = round($old_w/$scale1,2);
                            $end_w = $old_w;
                    } else{
                            $end_w = round($old_h*$scale1,2);
                            $end_h = $old_h;
                    }
                    $start_w = 0;
                    $start_h = 0;
                    $width = $new_w;
                    $height= $new_h;
                }
            // 载入原图
            $createFun  = 'ImageCreateFrom'.$type;
            $oldimg     = $createFun($this->img);
            // 创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor')){
                $newimg = imagecreatetruecolor($width, $height);
            } else{
                $newimg = imagecreate($width, $height);
            }
            // 复制图片
            if(function_exists("ImageCopyResampled")){
                    ImageCopyResampled($newimg, $oldimg, 0, 0, $start_w, $start_h, $width, $height, $end_w,$end_h);
            } else{
                ImageCopyResized($newimg, $oldimg, 0, 0, $start_w, $start_h, $width, $height, $end_w,$end_h);
            }

            // 对jpeg图形设置隔行扫描
            $type == 'jpeg' && imageinterlace($newimg,1);
            // 生成图片
			// $filename=mb_convert_encoding($filename,"UTF-8",'auto');
            // header( 'Content-Type:text/html;charset=utf-8 ');  
            $imageFun = 'image'.$type;
            !@$imageFun($newimg,$filename,100) && die('保存失败!检查目录是否存在并且可写?');
            ImageDestroy($newimg);
            ImageDestroy($oldimg);
            return $filename;
        }
        return false;
    }

    // water(保存地址,水印图片,水印位置,透明度)
        public function water($filename,$water,$pos=0,$pct=50){
                // 加载水印图片
                $info = $this->getImageInfo($water);
                if(!empty($info[0])){
                        $water_w = $info[0];
                        $water_h = $info[1];
                        $type = $info['type'];
                        $fun  = 'imagecreatefrom'.$type;
                        $waterimg = $fun($water);
                } else{
                        return false;
                }
                // 加载背景图片
                $info = $this->getImageInfo($this->img);
                if(!empty($info[0])){
                        $old_w = $info[0];
                        $old_h = $info[1];
                        $type  = $info['type'];
                        $fun   = 'imagecreatefrom'.$type;
                        $oldimg = $fun($this->img);
                } else{
                        return false;
                }
                // 剪切水印
                $water_w >$old_w && $water_w = $old_w;
                $water_h >$old_h && $water_h = $old_h;

                // 水印位置
                switch($pos){
                    case 0://随机
                    $posX = rand(0,($old_w - $water_w));
                    $posY = rand(0,($old_h - $water_h));
                    break;
                case 1://1为顶端居左
                    $posX = 0;
                    $posY = 0;
                    break;
                case 2://2为顶端居中
                    $posX = ($old_w - $water_w) / 2;
                    $posY = 0;
                    break;
                case 3://3为顶端居右
                    $posX = $old_w - $water_w;
                    $posY = 0;
                    break;
                case 4://4为中部居左
                    $posX = 0;
                    $posY = ($old_h - $water_h) / 2;
                    break;
                case 5://5为中部居中
                    $posX = ($old_w - $water_w) / 2;
                    $posY = ($old_h - $water_h) / 2;
                    break;
                case 6://6为中部居右
                    $posX = $old_w - $water_w;
                    $posY = ($old_h - $water_h) / 2;
                    break;
                case 7://7为底端居左
                    $posX = 0;
                    $posY = $old_h - $water_h;
                    break;
                case 8://8为底端居中
                    $posX = ($old_w - $water_w) / 2;
                    $posY = $old_h - $water_h;
                    break;
                case 9://9为底端居右
                    $posX = $old_w - $water_w;
                    $posY = $old_h - $water_h;
                    break;
                default: //随机
                    $posX = rand(0,($old_w - $water_w));
                    $posY = rand(0,($old_h - $water_h));
                    break;
                }
            // 设定图像的混色模式
                imagealphablending($oldimg, true);
                // 添加水印
                imagecopymerge($oldimg, $waterimg, $posX, $posY, 0, 0, $water_w,$water_h,$pct);
                $fun = 'image'.$type;
                !@$fun($oldimg, $filename,100) && die('保存失败!检查目录是否存在并且可写?');
                  imagedestroy($oldimg);
                  imagedestroy($waterimg);
                  return $filename;
        }
}
?>
<!-- ///////////////////////////////////////////////////////////////////////////
祝：使用顺利! -->