<h1>
	Welcome to The TaskBoard Pages. <br>
	This is a list page.
</h1>

<?php $create_task_url = site_url('task/create'); ?>

<?php echo form_open(site_url('task/explore')); ?>
<table border="1">
<fieldset>
	<tr>
		<th colspan="6" algin="center"> Search </th>
	</tr>
	<tr>
		<td> Title </td>
		<td> <input type="text" id="title" name="title" value="" width="100%" /> </td>
		<td> Memo </td>
		<td> <input type="text" id="memo" name="memo" value="" width="100%" /> </td>
		<td> KeyWord </td>
		<td> <input type="text" id="keyword" name="keyword" value="" width="100%" /> </td>
	</tr>
</fieldset>
</table>

<button type="button" name="submit" value="submit">
	<div style="font-size: 19px;"> Execution </div>
</button>

<button type="button" name="submit" value="create" onClick="location.href = '<?php echo $create_task_url;?>';">
	<div style="font-size: 19px;"> New Task </div>
</button>

</form>
