<h1>
	Welcome to The TaskBoard Pages. <br>
	This is a list page.
</h1>

<?php $create_task_url = site_url('task/create'); ?>

<?php echo form_open(site_url('task/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: left'>Search</th>
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
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo $create_task_url;?>';">
			<div style="font-size: 19px;"> New Task </div>
		</button>
    </fieldset>
</form>
