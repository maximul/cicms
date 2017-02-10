<div align="left" style="padding: 0px 20px;">
	<p><b>ID-ссылки:</b><?=$link_id?></p>
	<p><b>Описание ссылки:</b><?=$descr?></p>
	<p><b>URL:</b><?=$url?></p>
    <p><b>Ссылка для перехода:</b><a href="<?=base_url().'go/'.$link_id?>"><?=base_url().'go/'.$link_id?></a></p>
	<p><b>Кликов:</b><?=$clicks?></p>
</div>

<p><?=anchor('admin/links/edit/'.$link_id, 'Редактировать ссылку')?></p>

<p><?=anchor('admin/links/del/'.$link_id, 'Удалить ссылку')?></p>

<p><?=anchor('admin/links', 'Вернуться к списку ссылок')?></p>
