<?php
$project_tags = is_null($project)?
    array():
    $this->ProjectTag->get_projecttags_from_project_id
        ($this->User->logined(), $project['project_id']);
?>

<?php echo form_open("project/edit/".(($project === null)? "new": $project["project_id"])); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Project Title</th>
                        <td><input type="text" id="project_name" name="project_name" value="<?php echo ($project === null)? '': $project['project_name']; ?>" /></td>
                </tr>
                <tr>
                    <th style='text-align: left; vertical-align:top;'>Project Tag</th>
                    <td>
                        <?php echo form_dropdown(
                            'project_tag_id1',
                            $this->ProjectTag->get_dropdown_array(
                                $this->User->logined()
                            ),
                            (count($project_tags) < 1)?
                                '':
                                $project_tags[0]['project_tag_id']
                            );
                        ?> <br>
                        <?php echo form_dropdown(
                            'project_tag_id2',
                            $this->ProjectTag->get_dropdown_array(
                                $this->User->logined()
                            ),
                            (count($project_tags) < 2)?
                                '':
                                $project_tags[1]['project_tag_id']
                            );
                        ?> <br>
                        <?php echo form_dropdown(
                            'project_tag_id3',
                            $this->ProjectTag->get_dropdown_array(
                                $this->User->logined()
                            ),
                            (count($project_tags) < 3)?
                                '':
                                $project_tags[2]['project_tag_id']
                            );
                        ?> <br>
                        <?php echo form_dropdown(
                            'project_tag_id4',
                            $this->ProjectTag->get_dropdown_array(
                                $this->User->logined()
                            ),
                            (count($project_tags) < 4)?
                                '':
                                $project_tags[3]['project_tag_id']
                            );
                        ?> <br>
                        <?php echo form_dropdown(
                            'project_tag_id5',
                            $this->ProjectTag->get_dropdown_array(
                                $this->User->logined()
                            ),
                            (count($project_tags) < 5)?
                                '':
                                $project_tags[4]['project_tag_id']
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
