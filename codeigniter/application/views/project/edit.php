<h1>
    Edit Project
</h1>

<?php echo validation_errors(); ?>

<?php echo form_open("project/edit/".$project_id); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Project Title</th>
                        <td><input type="text" id="project_name" name="project_name" value="" /></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>