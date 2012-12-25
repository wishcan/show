
<div id="form_content">
    <script src="<?php echo Yii::app()->baseUrl.'/js/jscal2/jscal2.js'; ?>"></script>
    <script src="<?php echo Yii::app()->baseUrl.'/js/jscal2/cn.js' ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/jscal2.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/steel/steel.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/js/jscal2/border-radius.css' ?>" />
<h3 class="top_l"><span id="title">添加成员</span><i class="top_r"></i></h3>
<div class="c"></div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>