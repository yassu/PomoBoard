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
