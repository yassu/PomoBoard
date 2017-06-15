<?php echo form_open(site_url('indicated_point/explore')); ?>
    <fieldset>
        <table border="1">
            <tbody>
                <tr>
                    <th style='text-align: center' colspan="14">Search</th>
                </tr>
                <tr>
                    <th style='text-align: left'> Title </th>
                    <td><input type="text" id="title" name="title" value="" /></td>
                    <th style='text-align: left'> Memo </th>
                    <td><input type="text" id="memo" name="memo" value=""> </td>
                    <th style='text-align: left'> Keyword </th>
                    <td><input type="text" id="keyword" name="keyword" value=""></td>
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
        <button type="button" name="submit" value="create" onClick="location.href = '<?php echo site_url('indicated_point/edit').'/new';?>';">
            <div style="font-size: 19px;"> New Indicated Point </div>
        </button>
    </fieldset>
</form>


<?php
if (! empty($list)):
?>
    <table border="1">
        <tr>
            <td> Id </td>
            <td> Title </td>
            <td> Created Date </td>
            <td> Updated Date </td>
            <td> Delete </td>
        </tr>
        <?php
        foreach($list as $indicated_point):
        ?>
            <tr>
                <td> #<?php echo $indicated_point['indicated_point_id']; ?> </td>
                <td> <?php echo $indicated_point['title']; ?> </td>
                <td> <?php echo display_date_str($indicated_point['created_date']); ?> </td>
                <td> <?php echo display_date_str($indicated_point['updated_date']); ?></td>
                <td> Delete </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
<?php
endif;
?>