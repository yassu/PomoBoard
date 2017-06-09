<?php $create_task_url = site_url('task/create'); ?>

<?php echo form_open(site_url('task/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="6">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Title </th>
                    <td><input type="text" id="title" name="title" value="" /></td>
					<th style='text-align: left'> Memo </th>
					<td><input type="text" id="memo" name="memo" value=""> </td>
					<th style='text-align: left'> Keyword </th>
					<td><input type="text" id="keyword" name="keyword" value=""></td>
                </tr>
            </tbody>
        </table>
		<button type="submit" name="submit" value="submit">
			<div style="font-size: 19px;"> Execution </div>
		</button>
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('task/edit').'/new';?>';">
			<div style="font-size: 19px;"> New Task </div>
		</button>
    </fieldset>
</form>

<?php
if (!empty($list))
{ ?>
	<table border="1">
		<tr>
			<td> Title </td>
			<td> Memo </td>
			<td> Created Date </td>
			<td> Updated Date </td>
			<td> Delete </td>
		</tr>
		<?php
		foreach($list as $task)
		{
		?>
			<tr>
				<td> <a href="<?php echo site_url('task/edit'); ?>/<?php echo $task['task_id']; ?>"> <?php echo $task['title']; ?> </a></td>
				<td> <?php echo $task['memo']; ?> </td>
				<td> <?php echo display_date_str($task['created_date']); ?> </td>
				<td> <?php echo display_date_str($task['updated_date']); ?> </td>
				<td> <a href="<?php echo site_url('/task/remove'); ?>/<?php echo $task['task_id']; ?>"> Delete </a> </td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}
?>