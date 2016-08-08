<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/8/8
 * Time: 11:46
 */
class Test_model extends CI_Model{
    public $where;
    function __construct()
    {
        parent::__construct();
        $this->load->model('s_model');
        $this->where = $this->getWhere();
    }
    
    function getData() {
       
       return [
           'where'=>$this->where,
           'data'=>$this->getItemData(),
           'table'=>$this->getTable()
       ];
    }
    
    function getItemData(){
        $param['db'] = 'report';
        $where = $this->where;
        $table = $where['table'];
        $param['sql'] = "select * from $table";
        $res = $this->s_model->getDBData($param);
        $title = [];
        foreach ($res as $item) {
            if ($item){
                foreach ($item as $k => $v){
                    $title[$k] = $k;
                }
            }
        }
        return [
            'data'=>$res,
            'title'=>$title
        ];
    }
    
    function getWhere(){
        $def = $this->input->post('table');
        $where['table'] =isset($def)?$def:'report_file';
        return $where;
    }
    
    function getTable(){
        $param['db'] = 'report';
        $param['sql'] = 'show tables';
        $res = $this->s_model->getDBData($param);
        foreach ($res as $v) {
            $table[]= $v['Tables_in_report'];
        }
        return $table;
    }
}