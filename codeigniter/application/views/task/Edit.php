<h1>
    Edit Task
</h1>

<?php echo validation_errors(); ?>

<?php echo form_open("task/edit/".$task["task_id"]); ?>
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
                        <select name="project_id">
                            <option value=""> -- </option>
                            <?php
                            foreach ($projects as $project):
                            ?>
                            <option value="<?php echo $project['project_id']; echo set_select('project_id', strval($project['project_id'])); ?>">
                                <?php echo $project['project_name']; ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>