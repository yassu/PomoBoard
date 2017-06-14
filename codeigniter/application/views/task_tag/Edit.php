<?php echo form_open("task_tag/edit/new"); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style="text-align: left"> Task Tag Name </th>
                    <td>
                        <input type="text" id="task_tag_name" name="task_tag_name"
                            value="">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>