<input type='hidden' value='<?php echo $data->title?>' class='title'/>
<div class='center'>
<div class='video' style='padding:100px 200px;width:560px;'>
<?php echo $data->swf;?>

</div>
<p><?php if($data->description)echo $data->description;?></p>
</div>
<script type='text/javascript'>

$("title").text($(".title").val());
</script>