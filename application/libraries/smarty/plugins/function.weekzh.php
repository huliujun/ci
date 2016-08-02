<?php
//格式化中文的星期几
function smarty_function_weekzh($params)
{
	$time = $params['time'] ;
	$map = array(1=>'一',2=>'二',3=>'三',4=>'四',5=>'五',6=>'六',0=>'日') ;

	if(strpos($time, '-') === FALSE)
	{
		$index = date('w',(int)$time) ;
	}
	else if(is_string($time))
	{
		$index = date('w',strtotime($time)) ;
	}
	return $map[$index] ;
}