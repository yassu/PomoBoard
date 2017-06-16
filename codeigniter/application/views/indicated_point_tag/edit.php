<?php echo form_open("indicated_point_tag/edit/".((is_null($indicated_point_tag)? "new": $indicated_point_tag['indicated_point_tag_id']))); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Indicated Point Tag Name</th>
                        <td><input type="text" id="indicated_point_tag_name" name="indicated_point_tag_name"
                            value="<?php echo is_null($indicated_point_tag)? '': $indicated_point_tag['indicated_point_tag_name']; ?>" /></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <button type="submit" class="btn btn-success" value="submit"> Submit </button>
    </p>
</form>