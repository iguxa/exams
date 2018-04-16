<?php

//Работа с файлом
class find{
    //Получение параметров
    static function  take_param(){
        $paramsPath = 'config/config.php';
        $params = include($paramsPath);
        return $params;
    }
    //Получение файла
    static function take_file(){
        $params = self::take_param();
        $file = file($params['file_name']);
        $limit = $params['limit_page'];
        $count = count($file);
        for($i = 0;$i<=$count;$i++)
        {
            $str .= $file[$i];
        }
        $mask =  preg_split("/[\s,]+/", $str);
        $order = $mask;
        for($i = 0;$i<=$count;$i++)
        {
            if(!$mask[$i]) unset($order[$i]);
        }
        $count = count($mask);
        $total_pages = $count / $limit;
        $real_pages = $total_pages;
        if(is_float($total_pages)) $real_pages = ceil($total_pages);
        else $real_pages++;
        $order['limit_page'] = $real_pages;
        return $order;
    }
    //Передача только файла
    static function get_file(){
        $order = self::take_file();
        unset($order['limit_page']);
        return $order;
    }
    //Передача параметров для пагинатора
    static function get_paginator(){
        $order = self::take_file();
        $result = $order['limit_page'];
        return $result;
    }
    //Передача параметров для количества показываемых записей (offset)
    static function limit_articles_on_pages($page){
        $params = self::take_param();
        $limit = $params['limit_page'];
        $start_from = ($page-1) * $limit;
        $end_from = $start_from + $limit - 1;
        $result['start'] = $start_from;
        $result['end'] = $end_from;
        //var_dump($result);
        return $result;
    }

}
//Редактирование файла (изменение,удаление,добавление)
class burn{
    public $value = false;
    public $page  = false;
    public $key  = false;
    public $change = false;

    function __construct($value,$page,$key,$change)
    {
        $this -> value = $value;
        $this -> page = $page;
        $this -> key = $key;
        $this -> change = $change;

    }
    public function start_burn()
    {
        $value = $this -> value;
        $page = $this -> page;
        $key = $this -> key;
        $change = $this ->change;
        $order = find::get_file();
        if($change)
        {

            if($key)
            {   $key--;
                $order[$key] = $value;
                echo 'change'; //for console
            }
            else
            {
                unset($order[$key]);
                sort($order);
                echo 'delete'; //for console
            }
        }
        else
        {
            array_push($order,$value);
            //add
            include_once ('link.php');
        }
        $params = find::take_param();
        if(file_exists($params['file_name'])) unlink ($params['file_name']);
        foreach($order as $key => $value ){
            file_put_contents($params['file_name'], trim($value).' ', FILE_APPEND);
        }

    }

}
