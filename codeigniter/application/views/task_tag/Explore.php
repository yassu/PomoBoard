<?php echo form_open(site_url('task_tag/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="14">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Name </th>
                    <td><input type="text" id="name" name="name" value="" /></td>
					<td> <input type="date" id="begin_created_date" name="begin_created_date" class="project_explore_date"> </td>
					<td> 〜 </td>
					<td> <input type="date" id="end_created_date" name="end_created_date" class="project_explore_date"></td>
					<th style='text-align: left'> Updated Date </th>
					<td> <input type="date" id="begin_updated_date" name="begin_updated_date" class="project_explore_date"> </td>
					<td> 〜 </td>
					<td> <input type="date" id="end_updated_date" name="end_updated_date" class="project_explore_date"> </td>
                </tr>
            </tbody>
        </table>
		<button type="submit" name="submit" value="explore">
			<div style="font-size: 19px;"> Execution </div>
		</button>
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('task_tag/edit').'/new';?>';">
			<div style="font-size: 19px;"> New Task Tag </div>
		</button>
    </fieldset>
</form>


<?php
if (!empty($list)):
?>
	<table border="1">
		<tr>
			<td> ID </td>
			<td> Name </td>
			<td> Created Date </td>
			<td> Updated Date </td>
			<td> Delete </td>
		</tr>
		<?php
		foreach($list as $task_tag):
		?>
			<tr>
				<td> <a href="<?php echo site_url('task_tag/edit').'/'.$task_tag['task_tag_id']; ?>">#<?php echo $task_tag['task_tag_id']; ?> </td>
                <td> <?php echo $task_tag['task_tag_name']; ?> </td>
                <td> <?php echo display_date_str($task_tag['created_date']); ?> </td>
                <td> <?php echo display_date_str($task_tag['updated_date']); ?> </td>
                <td><a href="<?php echo site_url('task_tag/delete').'/'.$task_tag['task_tag_id']; ?>"> Delete  </a></td>
			</tr>
		<?php
		endforeach;
		?>
	</table>
<?php
endif;
?>