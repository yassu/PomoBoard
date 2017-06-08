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
                </tr>
            </tbody>
        </table>
		<button type="submit" name="submit" value="explore">
			<div style="font-size: 19px;"> Execution </div>
		</button>
		<button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('project/edit'); ?>/new'">
			<div style="font-size: 19px;"> New Project </div>
		</button>
    </fieldset>
</form>


<?php
if (!empty($list))
{ ?>
	<table border="1">
		<tr>
			<td> Name </td>
            <td> Created Date </td>
            <td> Updated Date </td>
            <td> Delete </td>
		</tr>
		<?php
		foreach($list as $project)
		{
		?>
			<tr>
				<td> <a href="<?php echo site_url('project/edit'); ?>/<?php echo $project['project_id']; ?>"> <?php echo $project['project_name']; ?> </a></td>
				<td> <?php echo display_date_str($project['created_date']); ?> </td>
				<td> <?php echo display_date_str($project['updated_date']); ?> </td>
				<td> <a href="<?php echo ''; ?>/<?php echo ''; ?>"> Delete </a> </td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}
?>