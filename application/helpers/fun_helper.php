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
    if ($path == $_FILES) $path = array_values($path)[0]['tmp_name'];
    $PHPReader = new PHPExcel_Reader_Excel2007(); // Reader很关键，用来读excel文件
    if (!$PHPReader->canRead($path)) { // 这里是用Reader尝试去读文件，07不行用05，05不行就报错。注意，这里的return是Yii框架的方式。
        $PHPReader = new PHPExcel_Reader_Excel5();
        if (!$PHPReader->canRead($path)) {
            echo $errorMessage = "Can not read file.";
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

function query($db,$sql,$type='select') {
    $ci_model = new CI_Model;
    $database = $ci_model->load->database($db,true,null);
    if ($type != 'select')
        $res = $database->query($sql);
    else
        $res = $database->query($sql)->result_array();
    return $res;
}