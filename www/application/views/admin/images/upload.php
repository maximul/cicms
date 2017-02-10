<?=form_open_multipart('admin/images/do_upload') ?>

<input type="file" name="userfile" size="20" value="<?=set_value('userfile')?>"/>

<br /><br />

<input type="submit" value="Загрузить" />

</form>

<br /><br />

<?=iconv("Windows-1251", "UTF-8", $error)?>