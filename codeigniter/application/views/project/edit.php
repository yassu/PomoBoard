<?php echo form_open("project/edit/".(($project === null)? "new": $project["project_id"])); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Project Title</th>
                        <td><input type="text" id="project_name" name="project_name" value="<?php echo ($project === null)? '': $project['project_name']; ?>" /></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>