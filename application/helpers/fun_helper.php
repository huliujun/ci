<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/8/29
 * Time: 18:14
 */

function show($str){
    echo $str.'<br/>';
}

/**
 * Create array from excel
 * @param mixed $path       路径
 * @param boolean $sheet    第几个sheet
 * @param boolean $echo     输出几行几列
 * @return array
 */

function excel_get_array($path,$sheet = 0,$echo = false){
    require_once APPPATH . 'libraries/PHPExcel.php';
    if (!$path) {
        echo "path no used";
        exit;
    }
    if ($path == $_FILES) $path = array_values($path)[0]['tmp_name'];
    $PHPReader = new PHPExcel_Reader_Excel2007(); // Reader很关键，用来读excel文件
    if (!$PHPReader->canRead($path)) { // 这里是用Reader尝试去读文件，07不行用05，05不行就报错。
        $PHPReader = new PHPExcel_Reader_Excel5();
        if (!$PHPReader->canRead($path)) {
            echo $errorMessage = "Can not read file.";
            exit;
        }
    }
    $PHPExcel = $PHPReader->load($path);
    $currentSheet = $PHPExcel->getSheet($sheet); // 拿到第几个sheet（工作簿？）
    if ($echo){
        $allSheet = $PHPExcel->getSheetCount(); // sheet数
        $allColumn = $currentSheet->getHighestColumn();//取得当前工作表最大的列号,如，E
        $allRow = $currentSheet->getHighestRow();//取得当前工作表一共有多少行
        echo "sheet数：$allSheet, 最大的行是：$allRow, 最大的列是：$allColumn";
    }

    $dataArr = $currentSheet->toArray(null, true, true, true);
    return $dataArr;
}

/**
 * 导出功能,导出格式为CSV,按照标准格式导出  浏览器输出
 */
function excel_export($title,$data,$fname) {
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
    echo mb_convert_encoding($str, "gb2312", "UTF-8");
}

function query($db,$sql,$type='select') {
    //$ci_model = new CI_Model;
    // Get CodeIgniter super object.
    $CI =& get_instance();
    $database = $CI->load->database($db,true,null);
    if ($type != 'select')
        $res = $database->query($sql);
    else
        $res = $database->query($sql)->result_array();
    return $res;
}

function assign($data,$res=null){
    // Get CodeIgniter super object.
    $CI =& get_instance();
    if (is_array($data))
        $CI->tpl->assign($data);
    else
        $CI->tpl->assign($data,$res);
}

function display($tpl){
    // Get CodeIgniter super object.
    $CI =& get_instance();
    $CI->tpl->display($tpl);
}