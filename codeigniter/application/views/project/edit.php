<script type="text/javascript">
window.onload = function()
{
    var project_tag_board = document.getElementsByClassName('project_tag_board')[0];
    project_tag_board.appendChild(get_project_tag_p_elem(1, <?php echo json_safe_encode($this->ProjectTag->get_dropdown_array($this->User->logined()));?>));
}
</script>

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
                    <td class="project_tag_board"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>