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
        $where = $this->where;
        $table = $where['table'];
        $page = ($where['page']-1)*5;
        $sql = "select * from $table limit $page, 5";
        $res = query('my_db',$sql);
        $title = [];
        foreach ($res as $item) {
            if ($item){
                foreach ($item as $k => $v){
                    $title[$k] = $k;
                }
            }
        }

        if (isset($_POST['download']) && $_POST['download']) {
            $this->exportData($title, $res, 'test_' . date('Y-m-d'), time());exit;
        }
        return [
            'data'=>$res,
            'title'=>$title
        ];
    }

    public function importData(){


        if (isset($_POST['is_import']) and $_POST['is_import']){

            $arr = excel_get_array($_FILES,0,true);
            array_shift($arr);
            var_dump($arr);die;

            foreach($arr as $k=>$v)
            {
                $data[] =  array(
                    'id'	        =>	isset($v['A']) ? $v['A'] : '',
                    'channel_name'	=>	isset($v['B']) ? $v['B'] : '' ,
                    'platform_id'	=>	isset($v['C']) ? $v['C'] : '',
                    'platform_name'	=>	isset($v['D']) ? $v['D'] : '',
                    'is_lianyun'	=>	isset($v['E']) ? $v['E'] : 0,
                    'operator_name'	=>	'HULIUJUN',
                    'update_time'	=>	date('Y-m-d H:i:s')
                );
            }
            $finance = $this->load->database('my_db',true);
            $ret = $finance->insert_batch('con',$data);
            if (!$ret){
                echo '没有 成功 fail';
            }
        }


    }

    /**
     * 导出功能,导出格式为CSV,按照标准格式导出  浏览器输出
     */
    public function exportData($title,$data,$fname) {
        $fname = $fname?$fname:time();
        header("Content-Type: application/vnd.ms-execl;charset=gbk");
        header("Content-Disposition: attachment; filename=".urlencode($fname).".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //组合标题
        $str = '';
        foreach($title as $key => $value){
            if(isset($value['name'])){
                $str .= $value['name']."\t";
            }else{
                $str .= $value."\t";
            }

        }
        $str .= "\t\n";

        //组合data
        foreach ($data as $key=>$value){
            foreach($title as $k => $v){
                $str .= $value[$k]."\t";
            }
            $str .="\t\n";
        }
//        echo iconv("UTF-8","GBK//IGNORE",$str);
        echo mb_convert_encoding($str, "gb2312", "UTF-8");
    }

    function getWhere(){
        $where['table'] =isset($_POST['table'])?$_POST['table']:'con';
        $where['page'] =isset($_POST['page'])?$_POST['page']:'1';
        return $where;
    }

    function getRows($where){
        $sql = 'SELECT * FROM '.$where['table'];
        $res = query('my_db',$sql,1)->num_rows();
        return $res;
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
        $res = query('my_db','show tables');
        foreach ($res as $v) {
            $table[]= $v['Tables_in_my_db'];
        }
        return $table;
    }
}