<?=form_open('admin/links/add')?>

<table border="0" width="600" align="left" cellspacing="4">

	<tr>
		<td align="right">
			<b>ID для ссылки</b>
		</td>
        
		<td align="left">
			<input type="text" name="link_id" value="<?=set_value('link_id')?>">
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>Название ссылки</b>
		</td>
        
		<td align="left">
			<input type="text" name="descr" value="<?=set_value('descr')?>">
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>URL-ссылки</b>
		</td>
        
		<td align="left">
			<input type="text" name="url" value="<?=set_value('url','http://')?>">
		</td>
	</tr>
    
    <tr>
		<td align="right">
			&nbsp;
		</td>
        
		<td align="left">
			<input type="submit" value="Добавить">
		</td>
	</tr>

</table>

</form>
