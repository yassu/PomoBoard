<?php echo form_open("project/edit/".(($project === null)? "new": $project["project_id"])); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Project Title</th>
                        <td><input type="text" id="project_name" name="project_name" value="<?php echo ($project === null)? '': $project['project_name']; ?>" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Project Tag</th>
                    <td>
                        <?php
                            echo form_multiselect("project_tag_ids",
                                $this->ProjectTag->get_dropdown_array($this->User->logined()));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>