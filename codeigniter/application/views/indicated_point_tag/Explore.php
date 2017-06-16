<?php echo form_open(site_url('indicated_point_tag/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="10">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Name </th>
                    <td><input type="text" id="indicated_point_tag_name" name="indicated_point_tag_name" value="" /></td>
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
        <button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('indicated_point_tag/edit').'/new';?>';">
            <div style="font-size: 19px;"> New Indicated Point Tag </div>
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
            <td> Created Date </td>
            <td> Updated Date </td>
            <td> Delete </td>
        </tr>
        <?php
        foreach($list as $indicated_point_tag) :
        ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('indicated_point_tag/edit') . '/' . $indicated_point_tag['indicated_point_tag_id']; ?>">
                        # <?php echo $indicated_point_tag['indicated_point_tag_id']; ?> </td>
                    </a>
                </td>
                <td> <?php echo $indicated_point_tag['indicated_point_tag_name']; ?> </td>
                <td> <?php echo display_date_str($indicated_point_tag['created_date']); ?> </td>
                <td> <?php echo display_date_str($indicated_point_tag['updated_date']); ?> </td>
                <td> Delete </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
<?php
endif;
?>