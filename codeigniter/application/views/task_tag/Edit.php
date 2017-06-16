<?php echo form_open("task_tag/edit/" . $task_tag_id); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style="text-align: left"> Task Tag Name </th>
                    <td>
                        <input type="text" id="task_tag_name" name="task_tag_name"
                            value="<?php echo (is_null($task_tag))? '': $task_tag['task_tag_name'];?>">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <button type="submit" class="btn btn-success" value="submit"> Submit </button>
    </p>
</form>