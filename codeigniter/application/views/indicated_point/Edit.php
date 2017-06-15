<?php echo form_open("indicated_point/edit/new"); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style="text-align: left"> Indicated Point Title </th>
                    <td>
                        <input type="text" id="indicated_point_title" name="indicated_point_title" value="">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left"> Indicated Point Memo </th>
                    <td>
                        <input type="text" id="indicated_point_memo" name="indicated_point_memo" value="">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"> <input type="submit" value="submit" /> </p>
</form>