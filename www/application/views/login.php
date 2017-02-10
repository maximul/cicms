<?=form_open('admin/login')?>

<table border="0" width="650" align="left">

	<tr>
		<td align="right">
			<b>Логин:</b>
		</td>
        
		<td>
			<input type="text" name="login" value="<?=set_value('login')?>"/>
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>Пароль:</b>
		</td>
        
		<td>
			<input type="password" name="pass" value=""/>
		</td>
	</tr>

    <tr>
		<td>&nbsp;</td>        
		<td>
			<input type="submit" value="Войти"/>
		</td>
	</tr>

</table>

</form>
