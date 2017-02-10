<?php if (!empty($list)): ?>

<table width="780" border="1" align="center" cellpadding="4" cellspacing="0">

	<tr class="tshapka">
		<td width="100"><b><?=anchor('admin/links/sort/link_id', 'ID-ссылки')?></b></td>
		<td width="240"><b><?=anchor('admin/links/sort/descr', 'Название ссылки')?></b></td>
		<td><b><?=anchor('admin/links/sort/url', 'URL-ссылки')?></b></td>
		<td><b><?=anchor('admin/links/sort/clicks', 'Кликов')?></b></td>
	</tr>

	<?php foreach ($list as $one): ?>

	<tr>
		<td><?=anchor('admin/links/show/'.$one['link_id'], $one['link_id'])?></td>
		<td><?=$one['descr']?></td>
		<td><a href="<?=$one['url']?>"><?=$one['url']?></a></td>
		<td><font color="#0055aa"><?=$one['clicks']?></font></td>
	</tr>

	<?php endforeach ?>

</table>

<p align="center"><?=$page_links?></p>

<?php else: ?>

Нет записей
	
<?php endif ?>

<?=form_open('admin/links/search')?>

<table align="center" border="0">
	<tr><br />
		<td>Поиск:<br /><input type="text" name="str" value=""/></td>
		<td>
			<select name="field">
				<option value="link_id">ID-ссылки</option>
				<option value="descr">Название ссылки</option>
				<option value="url">URL</option>
			</select>
		</td>
		<tr>
			<td><input type="submit" value="Найти"/></td><td>&nbsp;</td>
		</tr>
	</tr>
</table>

</form>

<br />

<p><?=anchor('admin/links/add', 'Добавить новую ссылку')?></p>