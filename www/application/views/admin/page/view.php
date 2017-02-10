<div align="left" style="padding: 0px 20px;">
	<p><b>ID-страницы:</b><?=$page_id?></p>
	<p><b>Название страницы:</b><?=$title?></p>
	<p><b>URL для просмотра:</b><?=anchor($page_id.'.html')?></p>
	<p><b>Дата добавления:</b><?=date('j.m.Y H:i:s', $date)?></p>
    <p><b>Показывать:</b><?=($showed == 1)?'Да':'Нет'?></p>
</div>

<p><?=anchor('admin/pages/edit/'.$page_id, 'Редактировать страницу')?></p>

<p><?=anchor('admin/pages/del/'.$page_id, 'Удалить страницу')?></p>

<p><?=anchor('admin/pages', 'Вернуться к списку страниц')?></p>
