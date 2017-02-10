<?php if (!empty($list)): ?>

<table width="780" border="1" align="center" cellpadding="4" cellspacing="0">

	<tr class="tshapka">
		<td width="120"><b><?=anchor('admin/pages/sort/page_id', 'ID-страницы')?></b></td>
		<td width="240"><b><?=anchor('admin/pages/sort/title', 'Название страницы')?></b></td>
		<td><b><?=anchor('admin/pages/sort/date', 'Дата добавления')?></b></td>
		<td><b><?=anchor('admin/pages/sort/showed', 'Показывать')?></b></td>
	</tr>

	<?php foreach ($list as $one): ?>

	<tr>
		<td><?=anchor('admin/pages/show/'.$one['page_id'], $one['page_id'])?></td>
		<td><?=$one['title']?></td>
		<td><font color="#005555"><?=date('j.m.Y H:i:s', $one['date'])?></font></td>
		<td><font color="#0055aa"><?=($one['showed'] == 1)?'Да':'Нет'?></font></td>
	</tr>

	<?php endforeach ?>

</table>

<p align="center"><?=$page_links?></p>

<?php else: ?>

Нет записей
	
<?php endif ?>

<?=form_open('admin/pages/search')?>

<table align="center" border="0">
	<tr><br />
		<td>Поиск:<br /><input type="text" name="str" value=""/></td>
		<td>
			<select name="field">
				<option value="page_id">ID-страницы</option>
				<option value="title">Название страницы</option>
				<option value="text">Текст страницы</option>
			</select>
		</td>
		<tr>
			<td><input type="submit" value="Найти"/></td><td>&nbsp;</td>
		</tr>
	</tr>
</table>

</form>

<br />

<p><?=anchor('admin/pages/add', 'Добавить новую страницу')?></p>