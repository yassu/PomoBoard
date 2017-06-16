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
        <button type="submit" name="submit" value="explore" class="btn btn-success">
            Execution
        </button>
        <button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('project_tag/edit').'/new';?>';" class="btn btn-success">
            New Project Tag
        </button>
    </fieldset>
</form>


<?php
if (! empty($list)) :
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
       <tr>
      <td> <a href="<?php echo site_url('project_tag/edit'.'/'.$project_tag['project_tag_id']); ?>">#<?php echo $project_tag['project_tag_id']; ?> </a> </td>
                <td> <?php echo $project_tag['project_tag_name']; ?> </td>
                <td> <a href="<?php echo site_url('project_tag/delete') . '/' . $project_tag['project_tag_id']; ?>">Delete</a> </td>
     </tr>
    <?php
    endforeach;
    ?>
    </table>
<?php
endif;
?>