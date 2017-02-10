<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_set extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load_config();
    }

    //Грузит настройки
    function load_config()
    {
        //Проверка существует ли таблица
        if (!$this->db->table_exists('settings')) {
            $this->install();
        } else {
            $this->load->library('session');
        }

        $query = $this->db->get('settings');

        $sets = $query->result();

        foreach ($sets as $row) {
            $val = $row->value;
            if (is_numeric($val)) {
                $val = $val + 0;
            }
            $this->config->set_item($row->param, $val);
        }
    }

    //Функция инсталляции БД из файла
    function install()
    {

        //Имя файла SQL
        $sql_file = './system/db.sql';

        $buffer = file_get_contents($sql_file);

        if (empty($buffer)) {
            die('Невозможно прочитать SQL-файл!');
        }

        $prev = 0;
        $i = 0;
        while ($next = strpos($buffer, ";", $prev + 1)) {
            $i++;
            $a = substr($buffer, $prev + 1, $next - $prev);
            $this->db->query($a);
            $prev = $next;
        }
        //$res = "Выполнено $i команд";
        redirect('');

    }

}
?>