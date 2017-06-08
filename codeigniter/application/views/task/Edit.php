<h1>
    Edit Task
</h1>

<?php echo validation_errors(); ?>

<?php echo form_open("task/edit/".(($task === null)? "new": $task["task_id"])); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Task Title</th>
                        <td><input type="text" id="task_title" name="task_title" value="<?php echo $task['title']; ?>" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Task Memo</th>
                    <td><textarea id="task_memo" name="task_memo"><?php echo $task['memo']; ?></textarea></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Project</th>
                    <td>
                        <?php echo form_dropdown('project_id',
                            $this->Project->get_dropdown_array($this->User->logined()),$task['project_id']); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>