<form action="<?php echo Yii::app()->createUrl('upload/add')?>" method="post"
enctype="multipart/form-data">
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>