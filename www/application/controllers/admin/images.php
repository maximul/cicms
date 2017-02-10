<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller {
    
    //Конструктор
    function __construct() {        
        parent::__construct();
        
        //Проверка - был ли вход
        $this->lib_auth->check_admin();                
    }
    
    //Список картинок
    function index($start_page = 0) {
        
        //Если не число - ставим 0
        if (!is_numeric($start_page)) {
            $start_page = 0;
        }
        
        //Грузим библиотеку Pagination
        $this->load->library('pagination');
        
        //Загрузка обшего количества
        $total = $this->getlist();
        
        //Подставка массива настроек
        $config = array();
        $config['base_url'] = base_url().'admin/images/index/';
        $config['total_rows'] = count($total);
        $config['per_page'] = $this->config->item('cms_per_page');
        $config['uri_segment'] = 4;
        
        //Устанавливаем настройки
        $this->pagination->initialize($config);
        
        unset($total); //Освбождаем память от этой переменной
        
        $list = $this->getlist($start_page);
        
        //Выводим список файлов
        $data = array();
        $data['list'] = $list;
        $data['page_links'] = $this->pagination->create_links(); //Ссылки
        
        //Отображаем страницу списка
        $this->lib_view->admin_page('images/index', $data, 'Список картинок');
        
    }
    
    function getlist($start_from = false) {
        
        //Загрузка хелпера Directory
        $this->load->helper('directory');
        
        if ($start_from !== false) {
            
            $directory = './img/upload/';
            
            $scanned_directory = array_diff(scandir($directory), array('..', '.'));
            
            return array_slice($scanned_directory, $start_from, $this->config->item('cms_per_page'));
            //Ограничение
        }
        
        //Список файлов
        $listimg = directory_map('./img/upload/', true);
        return $listimg;
    }
    
    //Удаление картинки
    function del($filename) {
        
        $filename = str_replace('-', '/', $filename);
        $filename = base64_decode($filename);
        
        unlink('img/upload/'.$filename);
        redirect('admin/images');
        
    }
    
    //отображение формы загрузки
    function show_upload() {
        $error = array('error' => '');
        $this->lib_view->admin_page('images/upload', $error, 'Загрузка картинки');
    }
    
    //Выполнение загрузки
    function do_upload() {
        
        $this->load->library('upload');
        
        //Конфигурация для загрузки
        $config = array();
        
        $config['upload_path'] = 'img/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
        $config['error_msg'] = array('msg' => iconv("UTF-8", "Windows-1251", 'Неверный формат файла.'));
        
        //Устанавливаем настройки
        $this->upload->initialize($config);
        
        //Делаем загрузку
        //$this->upload->do_upload();
        if ( ! $this->upload->my_do_upload())
		{
			$error = array('error' => $this->upload->display_errors($open = '<p><font color="cc0000">', $close = '</font></p>'));

			$this->lib_view->admin_page('images/upload', $error, 'Загрузка картинки');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//Переадресация к списку картинок
            redirect('admin/images', $data);
		}
        
        
        
    }
    
    //Список для TinyMCE
    function imglist() {
        
        //Загрузка хелпера TinyMCE
        $this->load->helper('tinymce');
        
        //Выводим хедеры для запрета кеширования
        nocache_headers();
        
        //Формируем код списка
        $code = 'var tinyMCEImageList = new Array(';
        
        //Загрузка хелпера Directory
        $this->load->helper('directory');
        //Список файлов
        $filelist = directory_map('./img/upload/', true);
        
        $firstelement = true; //Для первого эл-та, чтобы не ставить ","
        
        foreach ($filelist as $one) {
        	if ($firstelement) {
        		$firstelement = false; //Отменяем 1-й элемент
        	} else {
        		//Иначе добавляем запятую
        		$code.=', ';
        	}
            
            $code.= "\r\n"; //Перевод строки
            //Добавляем элемент списка
            $code.='["'.iconv("Windows-1251", "UTF-8", $one).'", "'.base_url().'img/upload/'.iconv("Windows-1251", "UTF-8", $one).'"]';
	
	   }
        
       //Конец кода
       $code.= "\r\n );";
       
       echo $code; //Выводим код
        
    }

}
?>