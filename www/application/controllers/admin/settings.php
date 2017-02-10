<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //Проверяем - вошёл ли администратор
        $this->lib_auth->check_admin();
    }

    //Собственно функция
    function index()
    {

        //Правила для валидации
        $rules = array(

            array(
                'field' => 'admin_login',
                'label' => 'Логин',
                'rules' => 'required|az_numeric',
                ),

            array(
                'field' => 'admin_pass',
                'label' => 'Пароль',
                'rules' => 'required|max_length[40]',
                ),

            array(
                'field' => 'per_page',
                'label' => 'Записей на страницу',
                'rules' => 'required|numeric',
                ),

            );

        //Применяем правила
        $this->form_validation->set_rules($rules);

        //Проверяем форму на валидность
        if ($this->form_validation->run()) {
            //Если всё правильно - сохраняем настройки
            //Так как их немного - можно не усложнять и не использовать циклы
            $data = array();
            $data['cms_admin_login'] = $this->input->post('admin_login');
            $data['cms_admin_pass'] = $this->input->post('admin_pass');
            $data['cms_per_page'] = $this->input->post('per_page');

            //Теперь в цикле - для каждой настройки делаем отдельную
            //операцию UPDATE
            foreach ($data as $key => $one) {
                $this->db->where('param', $key);
                //Для update нужен МАССИВ - потому второй параметр массив
                $this->db->update('settings', array('value' => $one));
            }

            //После сохранения настроек - перекидываем на главную
            redirect('admin');

            //Обратите внимание - если был сменён пароль, то дополнительная
            //защита (по хэшу) перекинет на страничку ВХОДА заново

        } else {
            //Иначе - показ формы
            $this->lib_view->admin_page('settings', array(), 'Настройки');

            //Второй параметр пустой - т.к. значения по умолчанию считает ВИД
        }


    }


}

?>