<?php echo form_open(site_url('project/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="10">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Name </th>
                    <td><input type="text" id="name" name="name" value="" /></td>
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
        <button type="submit" name="submit" value="explore" class="btn btn-success">
            Execution
        </button>
        <button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('project/edit'); ?>/new'" class="btn btn-success">
            New Project
        </button>
    </fieldset>
</form>


<?php
if (!empty($list)) { ?>
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
                <td> <a href="<?php echo site_url('project/delete').'/'.$project['project_id']; ?>/<?php echo ''; ?>"> Delete </a> </td>
     </tr>
    <?php
    }
    ?>
    </table>
<?php
}
?>