<h1>
	Project Explore
</h1>

<?php echo form_open(site_url('project/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="6">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Name </th>
                    <td><input type="text" id="name" name="name" value="" /></td>
					<th style='text-align: left'> Created Date </th>
					<td><input type="text" id="created_date" name="created_date" value=""> </td>
					<th style='text-align: left'> Updated Date </th>
					<td><input type="text" id="updated_date" name="updated_date" value=""></td>
                </tr>
            </tbody>
        </table>
		<button type="submit" name="submit" value="submit">
			<div style="font-size: 19px;"> Execution </div>
		</button>
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('project/edit'); ?>/new'">
			<div style="font-size: 19px;"> New Project </div>
		</button>
    </fieldset>
</form>
