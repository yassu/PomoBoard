<?php echo form_open("project_tag/edit/".(is_null($project_tag)? "new": $project_tag['project_tag_id'])); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Project Tag Name</th>
                        <td><input type="text" id="project_tag_name" name="project_tag_name"
                            value="<?php echo is_null($project_tag)? '': $project_tag['project_tag_name']; ?>" /></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <button type="submit" class="btn btn-success" value="submit"> Submit </button>
    </p>
</form>