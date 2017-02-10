<?=form_open('admin/pages/edit/'.$page_id)?>

<table border="0" width="600" align="left" cellspacing="4">

	<tr>
		<td align="right">
			<b>ID для страницы</b>
		</td>
        
		<td align="left">
			<?=$page_id?>
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>Название страницы</b>
		</td>
        
		<td align="left">
			<input type="text" name="title" value="<?=set_value('title', $title)?>"/>
		</td>
	</tr>
    
    <?=show_tinymce('mytext')?>

	<tr>
		<td align="right">
			<b>Показывать:</b>
		</td>
        
		<td align="left">
			<input type="checkbox" name="showed" value="1" <?=set_checkbox('showed',1,($showed == 1))?>/>
		</td>
	</tr>
    
    <tr>
		<td colspan="2" align="center">
        <br />
			<b>Текст страницы</b>
            <br /><br />
            <textarea id="mytext" name="text" cols="60" rows="12"><?=set_value('text',$text)?></textarea>
		</td>
	</tr>
    
    <tr>
		<td align="right">
			&nbsp;
		</td>
        
		<td align="left">
			<input type="submit" value="Сохранить изменения"/>
		</td>
	</tr>

</table>

</form>
