<?php echo form_open('user/sign_up'); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Name</th>
                        <td><input type="text" id="name" name="name" value="" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Password</th>
                    <td><input type="password" id="password" name="password" value="" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'> Password (Confirm) </th>
                    <td><input type="password" id="confirmed_password" name="confirmed_password" value=""></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>