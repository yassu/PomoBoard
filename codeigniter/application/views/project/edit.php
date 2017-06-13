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
                    <td class="project_tag_board">
                        <p>
                        <?php
                            echo form_dropdown("project_tag_id1",
                                $this->ProjectTag->get_dropdown_array($this->User->logined()));
                        ?>
                        <a href="#" onClick="append_project_tag(this, 2)">
                            <?php
                                echo img('/images/plus.png');
                            ?>
                        </a>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>