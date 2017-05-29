<h1>
	Login
</h1>


<?php echo validation_errors(); ?>

<?php echo form_open('user/login'); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th style='text-align: left'>Id</th>
                        <td><input type="text" id="id" name="id" value="" /></td>
                </tr>
                <tr>
                    <th style='text-align: left'>Password</th>
                    <td><input type="password" id="password" name="password" value="" /></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="submit"/></p>
</form>