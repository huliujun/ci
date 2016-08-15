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
           'table'=>$this->getTable(),
           'page'=>$this->getPage($this->where)
       ];
    }
    
    function getItemData(){
        $param['db'] = 'my_db';
        $where = $this->where;
        $table = $where['table'];
        $page = $where['page'];
        //var_dump($table);
        $param['sql'] = "select * from $table limit $page, 5";
        //var_dump($param['sql']);
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
        $def1 = $this->input->post('page');
        $where['table'] =isset($def)?$def:'con';
        $where['page'] =isset($def1)?$def1:'1';

        return $where;
    }

    function getRows($where){
        $db = $this->load->database('my_db',true);
        $query = $db->query('SELECT * FROM '.$where['table']);
        return $query->num_rows();
    }

    function getPage($where){
        $rows = $this->getRows($where);
        $page = $rows/5;
        $data = [];
        for($i = 1;$i <= $page;$i++){
            $data[] = $i;
        }
        return $data;
    }
    
    function getTable(){
        $param['db'] = 'my_db';
        $param['sql'] = 'show tables';
        $res = $this->s_model->getDBData($param);
        foreach ($res as $v) {
            $table[]= $v['Tables_in_my_db'];
        }
        return $table;
    }
}