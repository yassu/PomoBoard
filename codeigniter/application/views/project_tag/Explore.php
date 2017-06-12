<?php echo form_open(site_url('project_tag/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="14">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Name </th>
                    <td><input type="text" id="project_tag_name" name="project_tag_name" value="" /></td>
					<th style='text-align: left'> Created Date </th>
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
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('project_tag/edit').'/new';?>';">
			<div style="font-size: 19px;"> New Project Tag </div>
		</button>
    </fieldset>
</form>


<?php
if (! empty($list)):
?>
	<table border="1">
		<tr>
			<td> ID </td>
			<td> Name </td>
			<td> Delete </td>
		</tr>
		<?php
		foreach ($list as $project_tag):
		?>
			<td> #<?php echo $project_tag['project_tag_id']; ?> </td>
			<td> <?php echo $project_tag['project_tag_name']; ?> </td>
			<td> Delete </td>
		<?php
		endforeach;
		?>
	</table>
<?php
endif;
?>