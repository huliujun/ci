<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/7/14
 * Time: 17:18
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class test extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    
    function index(){
        $this->load->model('_model');

        $param['db'] = 'report';
        $param['sql'] = 'select * from sy_group';
        $data = $this->_model->getDBData($param);

        //这里我添加一些东西
        //这里我添加一些东西
        //这里我添加一些东西
        $title = [];
        foreach ($data as $item) {
            if ($item){
                foreach ($item as $k => $v){
                    $title[$k] = $k;
                }
            }
        }
        
        $this->tpl->assign("title",$title);
        $this->tpl->assign("data",$data);
        $this->tpl->display('test.tpl');
    }

}