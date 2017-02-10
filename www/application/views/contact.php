<?=form_open('contact')?>

<table border="0" width="650" align="left">

	<tr>
		<td align="right">
			<b>Ваш e-mail:</b>
		</td>
        
		<td>
			<input type="text" name="email" size="60" value="<?=set_value('email')?>"/>
		</td>
	</tr>

	<tr>
		<td align="right">
			<b>Тема сообщения:</b>
		</td>
        
		<td>
			<input type="text" name="subject" value="<?=set_value('subject')?>"/>
		</td>
	</tr>
    
	<tr>
		<td align="right">
			<b>Текст письма:</b>
		</td>
        
		<td>
			<textarea name="text" cols="44" rows="12"><?=set_value('text')?></textarea>
		</td>
	</tr>
    
     <tr>
		<td align="right"><?=$imgcode?></td>
        
		<td align="left">
			<input type="text" name="captcha" size="10" value=""/>
		</td>
	</tr>

</table>

</form>
