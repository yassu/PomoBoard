<h1>
    Create Task
</h1>

<?php echo form_open('task/create'); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Task Name</th>
                        <td><input type="text" id="task_name" name="task_name" value="" /></td>
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