<h1>
	Welcome to The TaskBoard Pages. <br>
	This is a list page.
</h1>
<br>

<?php $create_task_url = site_url('task/create'); ?>
<button type="button" name="submit" value="create" onClick="location.href = '<?php echo $create_task_url;?>';">
	<div style="font-size: 19px;"> New Task </div>
</button>
