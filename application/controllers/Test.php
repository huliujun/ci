<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/7/14
 * Time: 17:18
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->model('test_model');
        $this->test_model->importData();
        assign($this->test_model->getData());
        display('test.tpl');
        //$this->tpl->assign($this->test_model->getData());
        //$this->tpl->display('test.tpl');
    }


    function index1() {

        echo $_SERVER['DOCUMENT_ROOT'];
        echo 'welcome to ci study system';

        $i = file_get_contents("http://117.25.143.79/yyting/bookclient/ClientGetBookResource.action?bookId=5898&imei=ODYzMzk2MDIxNzQwMjI4&pageNum=2&pageSize=50&q=224&sc=68746020ee018d7b0b37f80ea6c456f4&sortType=0&token=7sUX-Ph26V3Leb-_aTtP7d8XMy9gnND7-zdukwv7lbY*");
        $j = (json_decode($i,true));
        $data = $j['list'];
        foreach ($j as $item) {

        }

        $path = "http://apis.guokr.com/handpick/article.json?limit=20&retrieve_type=by_since";
        $res = $this->get_arr_data_from_net($path)['result']    ;
        var_dump($res[0]);
        $this->tpl->assign("data",$data);
        $this->tpl->display('test1.tpl');
    }

    function get_arr_data_from_net($path){
        $obj = file_get_contents($path);
        $data = [];
        if($obj){
            $data = json_decode($obj,true);
        }
        return $data;
    }


    public function array_sort($arr, $keys, $type='asc'){
        $keysvalue = $new_array = array();
        foreach ($arr as $k=>$v){
            $keysvalue[$k] = isset($v[$keys]) ? trim($v[$keys]) : 0;
        }
        if(strtolower($type) == 'asc'){
            asort($keysvalue);
        }else{
            arsort($keysvalue);
        }
        reset($keysvalue);
        foreach ($keysvalue as $k=>$v){

                $new_array[$k] = $arr[$k];
        }
        return $new_array;
    }

    function abc(){

        $this->load->library('pagination');

        $config['base_url'] = 'http://test.com/test/';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;
        $config['enable_query_strings'] = true;
        $config['page_query_string'] = true;

        $this->pagination->initialize($config);
        $page = $this->pagination->create_links();


        //        $this->load->library('calendar');
//        echo $this->calendar->generate();
//        $this->load->helper('url');
//        echo base_url("views/js");
//        echo current_url();
//        $this->load->helper('download');
//        $down = ($this->input->post('down'));
//        $down2 = ($this->input->get('down'));
//
//        if ($down){
//            force_download('123.txt','woshi yige meimei');
//        }if ($down2){
//            force_download('123.txt','woshi yige meimei');
//        }
    }




}