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


        $this->load->library('calendar');
        echo $this->calendar->generate();
        $this->load->helper('url');
        echo base_url("views/js");
        echo current_url();


        $this->load->helper('download');
        $down = ($this->input->post('down'));
        $down2 = ($this->input->get('down'));

        if ($down){
            force_download('123.txt','woshi yige meimei');
        }if ($down2){
            force_download('123.txt','woshi yige meimei');
        }
        $def = $this->input->post('db');
        $where['db'] =isset($def)?$def:'report_file';
        $db = [
          'report_file'=>'file' ,
          'report_user'=>'user' ,
            
        ];


        $param['db'] = 'report';
        $param['sql'] = 'select * from '.$where['db'];
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



        $vaa = $_SERVER["PHP_SELF"];
        
        $this->tpl->assign("title",$title);
        $this->tpl->assign("vaa",$vaa);
        $this->tpl->assign("where",$where);
        $this->tpl->assign("db",$db);
        $this->tpl->assign("data",$data);
        $this->tpl->display('test.tpl');
    }

}