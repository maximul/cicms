<?=form_open('admin/pages/add')?>

<table border="0" width="600" align="left" cellspacing="4">

	<tr>
		<td align="right">
			<b>ID для страницы</b>
		</td>
        
		<td align="left">
			<input type="text" name="page_id" value="<?=set_value('page_id')?>"/>
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>Название страницы</b>
		</td>
        
		<td align="left">
			<input type="text" name="title" value="<?=set_value('title')?>"/>
		</td>
	</tr>
    
    <?=show_tinymce('mytext')?>

	<input type="hidden" name="date" value="<?=set_value('date',time())?>"/>

	<tr>
		<td align="right">
			<b>Показывать:</b>
		</td>
        
		<td align="left">
			<input type="checkbox" name="showed" value="1" <?=set_checkbox('showed',1,true)?>/>
		</td>
	</tr>
    
    <tr>
		<td colspan="2" align="center">
        <br />
			<b>Текст страницы</b>
            <br /><br />
			<textarea id="mytext" name="text" cols="60" rows="12"><?=set_value('text','Текст страницы')?></textarea>
		</td>
	</tr>
    
    <tr>
		<td align="right">
			&nbsp;
		</td>
        
		<td align="left">
			<input type="submit" value="Добавить"/>
		</td>
	</tr>

</table>

</form>
