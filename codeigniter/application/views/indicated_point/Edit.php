<?php echo form_open("indicated_point/edit/" . (($indicated_point_id === "new")? 'new': $indicated_point_id)); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style="text-align: left"> Indicated Point Title </th>
                    <td>
                        <input type="text" id="indicated_point_title" name="indicated_point_title"
                            value="<?php echo is_null($indicated_point)? '': $indicated_point['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left"> Indicated Point Memo </th>
                    <td>
                        <input type="text" id="indicated_point_memo" name="indicated_point_memo"
                            value="<?php echo is_null($indicated_point)? '': $indicated_point['memo']; ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <button type="submit" class="btn btn-success" value="submit"> Submit </button>
    </p>
</form>