<?=form_open ('admin/settings')?>

<table border="0" width="650" align="left">

<tr>
<td align="right"><b>Логин:</b></td>
<td>
<input type="text" name="admin_login" value="<?=set_value('admin_login',$this->config->item ('cms_admin_login'))?>"/>
</td>
</tr>

<tr>
<td align="right"><b>Пароль:</b></td>
<td>
<input type="text" name="admin_pass" value="<?=set_value('admin_pass', $this->config->item ('cms_admin_pass'))?>"/>
</td>
</tr>

<tr>
<td align="right"><b>Записей на страницу:</b></td>
<td>
<input type="text" name="per_page" size="6" value="<?=set_value('per_page',$this->config->item ('cms_per_page'))?>"/>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
<input type="submit" value="Сохранить"/>
</td>
</tr>

</table>

</form>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
