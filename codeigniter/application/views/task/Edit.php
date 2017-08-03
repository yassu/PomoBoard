<?php
$task_tags = is_null($task)?
    array():
    $this->TaskTag->get_task_tags_from_task_id(
        $this->User->logined(), $task['task_id']
    );
?>

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
                        <?php echo form_dropdown(
                            'project_id',
                            $this->Project->get_dropdown_array($this->User->logined()), $task['project_id']
                        ); ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left; vertical-align: top"> TaskTag </th>
                    <td>
                        <?php
                            echo form_dropdown(
                                'task_tag_id1',
                                $this->TaskTag->get_dropdown_array(
                                    $this->User->logined()
                                ),
                                (count($task_tags)<1)?
                                    '':
                                    $task_tags[0]['task_tag_id']
                            );
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <button type="submit" class="btn btn-success" value="submit"> Submit </button>
    </p>
</form>
