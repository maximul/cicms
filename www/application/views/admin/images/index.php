<table align="center" width="600" border="0" cellspacing="4" style="padding-left: 40px;">

<?php foreach ($list as $one): ?>

<?php
	$image_properties = array(
          'src' => 'img/upload/'.iconv("Windows-1251", "UTF-8", $one),
          'width' => '70',
          'height' => '70',
    );           
?>
	<tr>
		<td><?=anchor('img/upload/'.iconv("Windows-1251", "UTF-8", $one), img($image_properties).iconv("Windows-1251", "UTF-8", $one), 'target="_blank"') ?></td>
		<td><?=anchor('admin/images/del/'.str_replace('/', '-', base64_encode($one)), 'Удалить') ?></td>
	</tr>

<?php endforeach ?>

</table>

<p align="center"><?=$page_links?></p>

<br />

<p><?=anchor('admin/images/show_upload/', 'Загрузить новую картинку')?></p>