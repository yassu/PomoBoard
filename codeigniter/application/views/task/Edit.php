<h1>
    Edit Task
</h1>

<?php echo validation_errors(); ?>

<?php echo form_open("task/edit/".$task_id); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Task Title</th>
                        <td><input type="text" id="task_title" name="task_title" value="" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Task Memo</th>
                    <td><textarea id="task_memo" name="task_memo" value=""> </textarea></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>