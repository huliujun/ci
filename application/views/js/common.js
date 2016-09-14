
function evaluation_sub()
{
	var evaluation_id = $('#evaluation_id').val();
	var old_evaluation_id = $('#old_evaluation_id').val();
	if(!evaluation_id) return false;
	var app_name = $('#app_name').html();
	var developers = $('#developers').html();
	var level = $('#level').html();
				
	$.post(
		'/data/evaluate/check_evaluation/',
		{evaluation_id:evaluation_id,old_evaluation_id:old_evaluation_id,is_del:1,app_name:app_name,developers:developers,level:level},
		function(jsonobj)
		{
			if(jsonobj == 1)
			{
				alert('提交成功!');
				ajax.post_v2('/data/evaluate/show_no_evaluation_list');
			}
			else
			{
				alert('提交失败');
			}
		},
		'html'
		);

}

function do_blur(value)
{	
	if(value =='') return false;

	$.post(
		'/data/evaluate/check_evaluation',
		{old_evaluation_id:value,is_check:1},
		function(jsonobj){
			
			if(jsonobj.status !==0)
			{
				
				$('#app_name').html('');
				$('#developers').html('');
				$('#level').html('');
				$('#evaluation_submit_btn').attr('disabled','disabled');
				alert(jsonobj.msg);
			}
			else
			{	
				var app_name = jsonobj['data']['app_name'].value;
				var developers = jsonobj['data']['developers'].value;
				var level = jsonobj['data'].level;
				$('#app_name').html(app_name);
				$('#developers').html(developers);
				$('#level').html(level);
				if(app_name != '' && developers != '' && level != '')
				{
					$('#evaluation_submit_btn').attr('disabled',false);
				}
			}
		},
		'json'
		);
}


function evaluation_papa_sub()
{
	var evaluation_id = $('#evaluation_id').val();
	var old_evaluation_id = $('#old_evaluation_id').val();
	if(!evaluation_id) return false;
	var app_name = $('#app_name').html();
	var developers = $('#developers').html();
	var level = $('#level').html();
				
	$.post(
		'/data/evaluate_papa/check_evaluation/',
		{evaluation_id:evaluation_id,old_evaluation_id:old_evaluation_id,is_del:1,app_name:app_name,developers:developers,level:level},
		function(jsonobj)
		{
			if(jsonobj == 1)
			{
				alert('提交成功!');
				ajax.post_v2('/data/evaluate_papa/show_no_evaluation_list');
			}
			else
			{
				alert('提交失败');
			}
		},
		'html'
		);

}

function do_blur_papa(value)
{	
	if(value =='') return false;

	$.post(
		'/data/evaluate_papa/check_evaluation',
		{old_evaluation_id:value,is_check:1},
		function(jsonobj){
			
			if(jsonobj.status !==0)
			{
				
				$('#app_name').html('');
				$('#developers').html('');
				$('#level').html('');
				$('#evaluation_submit_btn').attr('disabled','disabled');
				alert(jsonobj.msg);
			}
			else
			{	
				var app_name = jsonobj['data']['app_name'].value;
				var developers = jsonobj['data']['developers'].value;
				var level = jsonobj['data'].level;
				$('#app_name').html(app_name);
				$('#developers').html(developers);
				$('#level').html(level);
				if(app_name != '' && developers != '' && level != '')
				{
					$('#evaluation_submit_btn').attr('disabled',false);
				}
			}
		},
		'json'
		);
}

 function show_markbox(obj)
{
    var $obj = $(obj);
    var pos = $obj.offset();
    $obj.parent().find('.pop-textarea').css({display:"block","left":pos.left-480,"top":pos.top-200});
    $obj.parent().find('.pop-textarea textarea').focus();
}

function hide_markbox(obj)
{
   var $obj = $(obj);

   if($obj.val() !== '')
   {
   		$obj.parent().parent().find('a').html('编辑');
   		$obj.parent().parent().find('a').removeClass('btn-danger');
   		$obj.parent().parent().find('a').addClass('btn-success');
   		
   }
   $obj.parent().css({display:"none"});
}

      function go_detail(channel_id,channel_name)
      {		
      		var is_graphic_2 = document.getElementById('is_graphic_2').value;
      		document.getElementById('channel').value = channel_id;
      		document.getElementById('tui_title').value = channel_name;
      		var node = 'game_node';
      		if(is_graphic_2 == '1')
      			node = 'media_box_2'
      		ajax.post_v2('/ad/media_rpt/detail',{},node);
      }


	/**
 * 展示备注页面
 * @param  {[type]} row [description]
 * @return {[type]}     [description]
 */
function show_markbtn(row)
{	
	row = row.toString();
	var html = '';

	if(row.indexOf('#') !== false)
	{	newrow = row.split('#');
		for(var i=0,count=newrow.length;i<count;i++)
		{	
			var html = '<div class="pop-textarea" style="position:absolute;display:none" ><textarea onblur="hide_markbox(this)"></textarea></div><a type="button" onclick="show_markbox(this);" class="btn btn-danger btn-xs markbtn-'+newrow[i]+'">备注</a>';
			$('.tb-box table tr').eq(newrow[i]).find('td').eq(16).html(html);
		
		}
	
	}else
	{
		var markbox = '<button type="button" class="btn btn-default"  data-toggle="popover" data-placement="left" data-content="aa">备注</button>';
		$('.tb-box table tr').eq(row).find('td').eq(16).html(markbox);
	}
}

/**
 * 展示备注页面
 * @param  {[type]} row [description]
 * @return {[type]}     [description]
 */
function show_markbtn_import(row,col)
{
	row = row.toString();
	var html = '';

	if(row.indexOf('#') !== false)
	{	newrow = row.split('#');
		for(var i=0,count=newrow.length;i<count;i++)
		{
			var html = '<div class="pop-textarea" style="position:absolute;display:none" ><textarea onblur="hide_markbox(this)"></textarea></div><a type="button" onclick="show_markbox(this);" class="btn btn-danger btn-xs markbtn-'+newrow[i]+'">备注</a>';
			$('.tb-box table tr').eq(newrow[i]).find('td').eq(col).html(html);

		}

	}else
	{
		var markbox = '<button type="button" class="btn btn-default"  data-toggle="popover" data-placement="left" data-content="aa">备注</button>';
		$('.tb-box table tr').eq(row).find('td').eq(col).html(markbox);
	}
}

 function show_markbtn_v2(row,col)
 {
     row = row.toString();
     var html = '';

     if(row.indexOf('#') !== false)
     {	newrow = row.split('#');
         for(var i=0,count=newrow.length;i<count;i++)
         {
             var html = '<div class="pop-textarea" style="position:absolute;display:none" ><textarea onblur="hide_markbox(this)"></textarea></div><a type="button" onclick="show_markbox(this);" class="btn btn-danger btn-xs markbtn-'+newrow[i]+'">备注</a>';
             $('.tb-box table tr').eq(newrow[i]).find('td').eq(col).html(html);

         }

     }else
     {
         var markbox = '<button type="button" class="btn btn-default"  data-toggle="popover" data-placement="left" data-content="aa">备注</button>';
         $('.tb-box table tr').eq(row).find('td').eq(col).html(markbox);
     }
 }

function show_markbtn_v3(row,col)
{
	row = row.toString();
	var html = '';

	if(row.indexOf('#') !== false)
	{	newrow = row.split('#');
		for(var i=0,count=newrow.length;i<count;i++)
		{
			var html = '<div class="pop-textarea" style="position:absolute;display:none" ><textarea onblur="hide_markbox(this)"></textarea></div><a type="button" onclick="show_markbox(this);" class="btn btn-danger btn-xs markbtn-'+newrow[i]+'">备注</a>';
			$('.tb-box table tr').eq(newrow[i]).find('td').eq(col).html(html);

		}

	}else
	{
		var markbox = '<button type="button" class="btn btn-default"  data-toggle="popover" data-placement="left" data-content="aa">备注</button>';
		$('.tb-box table tr').eq(row).find('td').eq(col).html(markbox);
	}
}

       //1.把行标红
      //2.把列标出来
      function flag_red(row,col,color,fontcolor)
      {  
      	 row = row.toString();
      	 
         if(row.indexOf('#') !== false)   //存在多行记录出错
         {	
            var newrow = row.split('#');
            for(var i=0,count=newrow.length;i<count;i++)
            {
                $('.tb-box table tr').eq(newrow[i]).css({"backgroundColor":""+color+"","color":""+fontcolor+""});
                //$('.tb-box table tr td').attr('title','hello world');
                 if(col !== 0 && col !== '')
                 {
                    $('.tb-box table tr').eq(newrow[i]).find('td').eq(col).css({"backgroundColor":"yellow"});
                 }
            }
         }
         else
         {	

             $('.tb-box table tr').eq(row).css({"backgroundColor":""+color+"","color":""+fontcolor+""});
             if(col !== 0 && col !== '')
             {
                $('.tb-box table tr').eq(row).find('td').eq(col).css({"backgroundColor":"yellow"});
             }
         }
         
      }
/****************************ajax-start*************************************/

/**
 * ajax加载统计图页面，动态执行里面的js脚本
 * @type json
 * @author  pengzhiwen
 */
var fun = {
	show_title:function(title_class){
		var x = 10;
		var y = 20;
		$("#"+title_class).mouseover(function(e){
			this.myTitle = this.title;
			this.title = "";
			var tooltip = "<div id='tooltip'>"+ this.myTitle +"<\/div>"; //创建 div 元素
			$("body").append(tooltip);	//把它追加到文档中
			$("#tooltip")
					.css({
						"top": (e.pageY+y) + "px",
						"left": (e.pageX+x)  + "px"
					}).show("fast");	  //设置x坐标和y坐标，并且显示
		}).mouseout(function(){
			this.title = this.myTitle;
			$("#tooltip").remove();   //移除
		}).mousemove(function(e){
			$("#tooltip")
					.css({
						"top": (e.pageY+y) + "px",
						"left": (e.pageX+x)  + "px"
					});
		});
	}
};


var ajax = {
	node_id : false,
	post:function(url,args,node_id)
	{	
		//清楚所有页面中的ajax请求
		if(typeof window.queen_id != 'undefined')
			window.clearInterval(window.queen_id) ;
		if(typeof(node_id)=='undefined')
			node_id = "ajax_node" ;
		if(typeof(args)=='undefined')
			args = null ;
		ajax.node_id = node_id ;
		
		$('.ui-popup-show ').css({"display":"none"});
		//document.getElementById(node_id).innerHTML = "<div style='width:100%;'><img style='margin-left:50%;margin-top:100px ;' src='/application/views/images/loading.gif'></div>" ;
		$('#'+node_id).append("<div class='loading' style='width:100%;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/images/loading.gif'></div>");
		$.post(url,args,this.post_callback) ;
	},
	/*
		这个方法跟上面的方法的唯一区别就是，这个不用传递参数，具体参数JS会自动搜索
	*/
	post_v1:function(url,node_id)
	{
		var obj = get_post_args();
		obj.page = page ;
		this.post(url,obj,node_id) ;
	},
	/*
		上面区别就是，如果传递了参数，就用传递的参数，否则就自动搜索参数
	*/
	post_v2:function(url,args,node_id)
	{
		if(typeof(node_id) == 'undefined')
			node_id = "ajax_node" ;
		// 如果没有传递参数，或者传递的是空变量，就自动搜索参数
		if(typeof(args) == 'undefined' || isEmptyObject(args))
		{
			args = get_post_args() ;
		}
		ajax.node_id = node_id ;
		//document.getElementById(node_id).innerHTML = "<div style='width:100%;'><img style='margin-left:50%;margin-top:100px ;' src='/application/views/images/loading.gif'></div>" ;
		$('#'+node_id).append("<div class='loading' style='width:100%;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/images/loading.gif'></div>");
		
		$.post(url,args,this.post_callback) ;
	},
    /*
	args里面传的参数优先页面上的参数，如果参数名称相同，会优先用args里面的参数
	*/
	post_v3:function(url,args,node_id)
	{
		if(typeof(node_id) == 'undefined')
			node_id = "ajax_node" ;

		args1 = get_post_args() ;
		args = jQuery.extend(args1, args) ;


		ajax.node_id = node_id ;
		//document.getElementById(node_id).innerHTML = "<div style='width:100%;'><img style='margin-left:50%;margin-top:100px ;' src='/application/views/images/loading.gif'></div>" ;
		$('#'+node_id).append("<div class='loading' style='width:100%;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/images/loading.gif'></div>");

		$.post(url,args,this.post_callback) ;
	},
	post_callback:function(content)
	{	
		// alert(ajax.node_id);
		var js = "function baidu(arg){alert(arg) ;}baidu(4444) ;" ;
		var obj = get_js(content) ;
		
		document.getElementById(ajax.node_id).innerHTML = content ;
		var obj = get_js(content) ;
		var js = obj[ 0 ].join( "\n" );
		if(js.length>0)
		{
			try
			{
				eval(js);
			}
			catch ( e )
			{
				alert("JS Error:" +js) ;
			}
		}
		//把消息显示出来
		if(typeof RET_MSG !== 'undefined' && RET_MSG != '')
		{
			alert(RET_MSG.msg);
			return false;
		}
		
	}
};


  function change_title(obj)
  {	
  	 var $obj = $(obj);
  	 var gamename = $obj.html();
  	 $("input[name='curname']").val(gamename);
  
  }

  
function get_js( str ) 
{
	var scp = '<script[^>]*>([\\S\\s]*?)<\/script>' ;
	var regexp = new RegExp( "<script[^>]*>([\\S\\s]*?)<\/script>","gim" );
	var Js = [];
	while( result = regexp.exec( str ) )
		//console.log(result[1]);
		Js.push( result[ 1 ] );
	Html = str.replace( regexp,'' );
	return [ Js,Html ];
}


/****************************ajax-end*************************************/



/****************************<{发送分页请求*************************************/
function turnpage(url,page,node_id,args)
{
	var obj = get_post_args();
	
	jQuery.extend(obj,args);
	obj.page = page ;
	
	ajax.post(url,obj,node_id);
}
function get_post_args()
{
	var inputs = document.getElementsByTagName('input') ;
	var obj = {};
	for(var i=0;i<inputs.length;i++)
	{	

		if(inputs[i].type=='checkbox')
		{	
			if(inputs[i].checked==true)
			{
				var key = inputs[i].name ;
				var value = inputs[i].value ;
				key = key.replace('[','') ;
				key = key.replace(']','') ;
				if(typeof(obj[key])=='undefined')
				{
					obj[key] = [] ;
				}
				// alert("key="+key+"\nValue="+value) ;
				if(key!='')
					obj[key].push(value) ;
			}
		}
		else if(inputs[i].type=='radio')
		{
			if(inputs[i].checked == true)
			{
				var key = inputs[i].name ;
				var value = inputs[i].value ;
				obj[key] = value ;
			}
		}
		else
		{
			var key = inputs[i].name ;

			var value = inputs[i].value ;
			//console.log(key+'=>'+value+'\n');
			obj[key] = value ;
		}
	}

	$('select').each(function(i){
		//console.log($(this).attr('name')+'=>'+$(this).val()+'\n');
		obj[$(this).attr('name')] = $(this).val();
	});

	return obj ;
}

/****************************发送分页请求}/>*************************************/


function get_post_args_v2()
{
	var inputs = document.getElementsByTagName('input') ;
	var obj = {};
	for(var i=0;i<inputs.length;i++)
	{	

		if(inputs[i].type=='checkbox')
		{	
			if(inputs[i].checked==true)
			{
				var key = inputs[i].name ;
				var value = inputs[i].value ;
				//key = key.replace('[','') ;
				//key = key.replace(']','') ;
				if(typeof(obj[key])=='undefined')
				{
					obj[key] = [] ;
				}
				// alert("key="+key+"\nValue="+value) ;
				if(key!='')
					obj[key].push(value) ;
			}
		}
		else if(inputs[i].type=='radio')
		{
			if(inputs[i].checked == true)
			{
				var key = inputs[i].name ;
				var value = inputs[i].value ;
				obj[key] = value ;
			}
		}
		else
		{
			var key = inputs[i].name ;

			var value = inputs[i].value ;
			//console.log(key+'=>'+value+'\n');
			obj[key] = value ;
		}
	}

	$('select').each(function(i){
		//console.log($(this).attr('name')+'=>'+$(this).val()+'\n');
		obj[$(this).attr('name')] = $(this).val();
	});

	return obj ;
}


//表格变色



/*实现表格鼠标悬停变色*/

//包裹元素的ID
function change_bgcolor(id)
{	
	$('#'+id+' table tr').bind({
			mouseover:function(){$(this).addClass('cur-row');},
			mouseout:function(){$(this).removeClass('cur-row');}
     })
}

//创建隐藏表单
function create_hidden(paraobj)
{
	$.each(paraobj,function(name,value){
		
		var input1=$("<input>");
		input1.attr("type","hidden");
		input1.attr("name",name);
		input1.attr("value",value);
		$('body').append(input1);
	});
}

//移除隐藏表单
function remove_hidden(paraobj)
{	
	$.each(paraobj,function(name,value){
		$("input[name='"+value+"']").remove();
	});
	
}




//动态创建表单
function create_form(url,jsonobj)
{
	var form=$("<form>");//定义一个form表单
	form.attr("style","display:none");
	form.attr("target","");
	form.attr("method","post");
	form.attr("action",url);
	$("body").append(form);//将表单放置在web中
	$.each(jsonobj,function(name,value){
		
		if(typeof value =='object'){
			$.each(value,function(name2,value2){
				var input1=$("<input>");
				input1.attr("type","hidden");
				input1.attr("name",name);
				input1.attr("value",value2);
				form.append(input1);
			})
		}
		else
		{
			var input1=$("<input>");
			input1.attr("type","hidden");
			input1.attr("name",name);
			input1.attr("value",value);
		}
		form.append(input1);
	});

	form.submit();//表单提交
	form.remove();

}


//动态创建表单
function create_form_v2(url,jsonobj,is_blank)
{	

	var form=$("<form>");//定义一个form表单
	form.attr("style","display:none");
	form.attr("target","");
	form.attr("method","post");
	if(is_blank == 1)
		form.attr('target','_blank');
	form.attr("action",url);
	$("body").append(form);//将表单放置在web中


	$.each(jsonobj,function(name,value){
        if(name != 'undefined')
        {
            //console.log(name +'==>'+ typeof name +'  '+ value +'==>'+ typeof value);
            if(typeof value =='object' && typeof value !='null'){
                $.each(value,function(name2,value2){
                    var input1=$("<input>");
                    input1.attr("type","hidden");
                    input1.attr("name",name);
                    input1.attr("value",value2);
                    form.append(input1);
                })
            }
            else
            {


                var input1=$("<input>");
                input1.attr("type","hidden");
                input1.attr("name",name);
                input1.attr("value",value);
            }
        }

		
		form.append(input1);
	});

	form.submit();//表单提交
	if($("input[name='is_download']"))
	{
		$("input[name='is_download']").remove()
	}
	form.remove();
	
}


function create_form_v3(url,jsonobj,is_blank)
{
	var form=$("<form>");//定义一个form表单
	form.attr("style","display:none");
	form.attr("target","");
	form.attr("method","post");
	if(is_blank == 1)
		form.attr('target','_blank');
	form.attr("action",url);
	$("body").append(form);//将表单放置在web中
	$.each(jsonobj,function(name,value){
		
		if(name != '' && name !='undefined' && typeof name !='null')
		{	
			console.log('name='+name+'value='+value);
			if(typeof value =='object'){
				$.each(value,function(name2,value2){
					var input1=$("<input>");
					input1.attr("type","hidden");
					input1.attr("name",name);
					input1.attr("value",value2);
					form.append(input1);
				})
			}
			else
			{	
				var input1=$("<input>");
				input1.attr("type","hidden");
				input1.attr("name",name);
				input1.attr("value",value);
			}
			
			form.append(input1);
		}
		

	});

	form.submit();//表单提交
	if($("input[name='is_download']"))
	{
		$("input[name='is_download']").remove()
	}
	form.remove();
}

//动态创建表单
function create_form_v5(url,jsonobj)
{
	var form=$("<form>");//定义一个form表单
	form.attr("style","display:none");
	form.attr("target","");
	form.attr("method","post");
	form.attr("action",url);
	$("body").append(form);//将表单放置在web中
	$.each(jsonobj,function(name,value){
		
		if(typeof value =='object'){
			$.each(value,function(name2,value2){
				var input1=$("<input>");
				input1.attr("type","hidden");
				input1.attr("name",name+"[]");
				input1.attr("value",value2);
				form.append(input1);
			})
		}
		else
		{
			var input1=$("<input>");
			input1.attr("type","hidden");
			input1.attr("name",name);
			input1.attr("value",value);
		}
		form.append(input1);
	});

	form.submit();//表单提交
	form.remove();

}

//在表格的头部绑定参数
function order_table(obj)
{	
	$obj = $(obj);

	if($obj.attr('class').indexOf('order') !== -1)
	{
		var field = $obj.attr('field');
		//var sj = $('#sj').val();// asc 正序 desc倒序
		var sj = document.getElementById('sj').value;
		if(sj == 'desc')//改变当前的排序状态
		{
			sj = 'asc';
		}
		else
		{
			sj = 'desc';
		}
		var url = $obj.attr('url');//需要发送的url
		var postobj = get_post_args();
        $("input[name='order_field_2']").val(field);
		postobj.field = field;
		postobj.sj = sj;
		var bindnode= $obj.attr('bindnode');
		//console.log(field+sj+url+params+bindnode);
		ajax.post(url,{postobj:postobj},bindnode);
	}
}




//在表格的头部绑定参数
function order_table_v2(obj)
{	
	$obj = $(obj);

	if($obj.attr('class').indexOf('order') !== -1)
	{
		var field = $obj.attr('field');
		//var sj = $('#sj').val();// asc 正序 desc倒序
		var sj2 = document.getElementById('sj2').value;
		if(sj2 == 'desc')//改变当前的排序状态
		{
			sj2 = 'asc';
		}
		else
		{
			sj2 = 'desc';
		}
		var url = $obj.attr('url');//需要发送的url
		var postobj = get_post_args();
        $("input[name='order_field_2']").val(field);
		postobj.field = field;
		postobj.sj2 = sj2;
		var bindnode= $obj.attr('bindnode');
		//console.log(field+sj+url+params+bindnode);
		ajax.post(url,{postobj:postobj},bindnode);
	}
}

/**
 * 跳转到第几页
 * @param  {[type]} btn_id  跳转第几页的input元素ID
 * @param  {[type]} url     分页请求数据的url
 * @param  {[type]} page    第几页
 * @param  {[type]} node_id 替换那个node节点dom树
 * @return {[type]}         [description]
 */
function go_page(btn_id,url,node_id)
{
	$('.'+btn_id).bind('keyup',function(e){
		if(e.keyCode === 13)
		{
			var page = $.trim($(this).val());
			var total = $.trim($(this).parent().parent().find('.total_page span').html());
			
			
			if(typeof page === 'string' && page !== '0' && page !=='' && parseInt(total) > 0 && parseInt(page) <= parseInt(total))
			{
				turnpage(url,page,node_id);
			}
			else
			{
				alert('输入页码数据有错');
			}
		}
	});
	
}

/**
 * 跳转到第几页,根据父id
 * @param  {[type]} btn_id  跳转第几页的input元素ID
 * @param  {[type]} url     分页请求数据的url
 * @param  {[type]} page    第几页
 * @param  {[type]} node_id 替换那个node节点dom树
 * @return {[type]}         [description]
 */
function go_page_two(id,btn_id,url,node_id)
{
	$('#'+'id'+''+'.'+btn_id).bind('keyup',function(e){
		if(e.keyCode === 13)
		{
			var page = $.trim($(this).val());
			var total = $.trim($(this).parent().parent().find('.total_page span').html());


			if(typeof page === 'string' && page !== '0' && page !=='' && parseInt(total) > 0 && parseInt(page) <= parseInt(total))
			{
				turnpage(url,page,node_id);
			}
			else
			{
				alert('输入页码数据有错');
			}
		}
	});

}

/**
 * 跳转到第几页
 * @param  {[type]} btn_id  跳转第几页的input元素ID
 * @param  {[type]} url     分页请求数据的url
 * @param  {[type]} page    第几页
 * @param  {[type]} node_id 替换那个node节点dom树
 * @return {[type]}         [description]
 */
function change_line(box_id,btn_id,url,node_id)
{	
	$('#'+box_id+' .'+btn_id).bind('keyup',function(e){
		if(e.keyCode === 13)
		{
			var list_len = $.trim($(this).val());
			var mypagesize = $.trim($(this).parent().parent().find('.persizenum').val());

			if(typeof list_len === 'string' && list_len !== 0 && list_len !=='')
			{
				turnpage(url,1,node_id,{"mypagesize":mypagesize});
				
			}
			else
			{
				alert('输入页码数据有错');
			}
		}
	});

	
}

/**
 * 显示消息
 * @param  {[type]} msg  [description]
 * @param  {[type]} type [description]
 * @return {[type]}      [description]
 */
function showmsg(msg,type)
{	
	
	var html = '<div class="alert ';
	if(type === 0)
	{
		html += ' alert-danger ';
	}
	else
	{
		html += ' alert-success ';
	}
    html += ' alert-dismissible fade in" role="alert">';
	html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	html += '<span aria-hidden="true">&times;</span></button>';
	html += '<strong>消息:</strong> '+msg+'</div>';
   $('#msgdiv').html(html);
  /* window.setTimeout(function(){

   		$('#msgdiv').html('');
   },12000);*/
}

function showmsg_v2(msg,type,id)
{	
	
	var html = '<div class="alert ';
	if(type === 0)
	{
		html += ' alert-danger ';
	}
	else
	{
		html += ' alert-success ';
	}
    html += ' alert-dismissible fade in" role="alert">';
	html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	html += '<span aria-hidden="true">&times;</span></button>';
	html += '<strong>消息:</strong> '+msg+'</div>';
   $('#'+id).html(html);
   /*window.setTimeout(function(){

   		$('#'+id).html('');
   },12000);*/
}

//用于显示pv，总计pv值得函数
function count(url)
{
	$.post('/p/count',{url:url},this.count_callback) ;
}
function count_callback(content)
{
	document.getElementById('count').innerHTML = content ; ;
}

/*
	判断一个对象是否为空
	如果 arg 为空，返回 true ；否则返回 false
*/
function isEmptyObject(arg)
{
	if(typeof(arg) !='object')				// 如果返回的不是对象，就认定是空对象
		return true ;
	for(var p in arg)
	{
		return false ;
	}
	return true ;
}

/**
 * 用于全选单选
 * @param  {[type]} p_class   点击的全选按钮
 * @param  {[type]} son_class 需要选中的子按钮
 * @return {[type]}           [description]
 */
function all_check(p_class,son_class)
{
	//全选单选
	$('.'+p_class).bind('click',function(){
		if($(this).prop('checked') === true)
			$('.'+son_class).prop('checked',true);
		else
			$('.'+son_class).prop('checked',false);
	});
}



	//全选单选
	function checkall(obj)
	{	
		//console.log('obj='+obj+'obj.checked='+obj.checked);
		var eles = document.getElementsByTagName('input');
		if(obj.checked == true)
		{
			for(var i=0;i<eles.length;i++)
			{	
				if(eles[i].type == 'checkbox' && (eles[i].className.toString().indexOf('son_mod') !== -1))
				{	

					eles[i].checked = true;
				}
					
			}
		}
		else
		{
			for(var i=0;i<eles.length;i++)
			{	if(eles[i].type == 'checkbox' && (eles[i].className.toString().indexOf('son_mod') !== -1))
					eles[i].checked = false;
			}

		}
		
	}
	
	//指定范围的全选单选
	function checkall_1(obj)
	{	
		//console.log('obj='+obj+'obj.checked='+obj.checked);
		var eles = $(obj).next("ul").find(".son_mod");//document.getElementsByTagName('input');
		if(obj.checked == true)
		{
			for(var i=0;i<eles.length;i++)
			{	
				if(eles[i].type == 'checkbox' && (eles[i].className.toString().indexOf('son_mod') !== -1))
				{	

					eles[i].checked = true;
				}
					
			}
		}
		else
		{
			for(var i=0;i<eles.length;i++)
			{	if(eles[i].type == 'checkbox' && (eles[i].className.toString().indexOf('son_mod') !== -1))
					eles[i].checked = false;
			}

		}
		
	}

/**
 * 点击批量处理按钮所做的操作
 * @param  {[type]} class   批量按钮的类名
 * @param  {[type]} url     提交的url
 * @param  {[type]} args    提交的参数
 * @param  {[type]} node_id 包裹返回的dom
 * @return {[type]}         [description]
 */
function batch_submit_checkbox(classname,url,args,node_id)
{
	var ids = new Array();
	$("input[type=checkbox]:checked").each(function(i){
		if($(this).attr('class') === classname)
			ids.push($(this).attr('value'));
	});
	if(isEmptyObject(ids))
	{
		alert('请选择要审批的订单!!!');
		return false;
	}
	if(!confirm('确定要批量审批吗?'))
		return false;
	var idsstr = ids.join(',');
	args.ids = idsstr;
	ajax.post(url,args,node_id);

}


//取消状态
function cancel_status(obj,classname,url)
{
	var $obj = $(obj);
	var html = $obj.html();
	var status=$obj.attr('idstatus');

	var ids = new Array();
	$("input[type=checkbox]:checked").each(function(i){
		if($(this).attr('class') === classname)
			ids.push($(this).attr('value'));
	});
	
	if(isEmptyObject(ids))
	{
		alert('请选择要取消的单子');
		return false;
	}

	if(confirm("确定要撤销到"+html+"?"))
	{
		var idsstr = ids.join(',');
		ajax.post(url,{is_cannel:1,ids:idsstr,status:status},'ajax_node');
	}
}
function show_notice(url)
{	
	// 避免多次 ajax请求
	if(document.getElementById('tip-box'))
	{
		document.getElementById('show_notice_id').style.display = '' ;
		document.getElementById('tip-box').style.display = '' ;
		return true ;
	}
	var obj = {
		url : url,
		act : 'show_notice'
	} ;
	$.post('/common/show_notice',obj,this.show_notice_callback) ;
}
function show_notice_callback(content)
{	
	var show_notice_node = document.getElementById('show_notice_id') ;
	var show_notice_position = getPosition(show_notice_node) ;
	
	var html ='<div class="tip-box" onmouseout="do_hide(\'tip-box\')" id="tip-box">';
	html += content ;
	html += "</div>" ;

	var pos = $('#show_notice_id').offset();
	//$('.tip-box').css({"top":pos.top,"left":pos.left});
	$('#show_notice_id').append(html) ;
	$('.tip-box').offset({top:pos.top-3,left:pos.left+40});
}
function getPosition(e, pnode)
{
	pnode = pnode || document.body;
	var t = l = 0;
	while( e && e != pnode ){
		t += e.offsetTop;
		l += e.offsetLeft;
		e = e.offsetParent;
	}
	t = parseInt( t );
	l = parseInt( l );
	if( isNaN( t ) )
		t = 0;
	if( isNaN( l ) )
		l = 0;
	return [ t,l ];
}
function do_hide(id)
{	
	//document.getElementById(id).style.display = 'none' ;
	$("#"+id).attr("style",'dispalay:none');
}


Array.prototype.myunique = function(){
 var res = [];
 var json = {};
 for(var i = 0; i < this.length; i++){
  if(!json[this[i]]){
   res.push(this[i]);
   json[this[i]] = 1;
  }
 }
 return res;
}



var valid = {

	sub_valid: function(url)	//提交的所有的拥有data_type的字段
	{	

		var flag = true ;
		var inputs = document.getElementsByTagName("input") ;
	
		for(var i=0,len=inputs.length;i<len;i++)
		{	
			if(inputs[i].getAttribute('data_type') != null)
			{	
				if(!this.valid_field(inputs[i].getAttribute('data_type'),inputs[i],inputs[i].getAttribute('zh')))
					flag = false ;
			}
				
		}

		if(flag)
		{
			var args = get_post_args() ;
			$.post(
				url,
				args,
				function(data)
				{	
					if(data.status == 1)
					{
						$('#sub_btn').attr('disabled','disabled');
					}
					alert(data.msg) ;
				},
				'json'
				) ;
		}
		
		return flag ;
	},
	valid_field : function(type,ele,label_name,flag)	//flag=1表示select
	{	
		//检查APPID和游戏上线时间两个必须同时存在，不然就不给予提交
		
		if((ele.name == 'app_id_android' || ele.name == 'online_time') || (ele.name=='app_id_ios' || ele.name == 'online_time_ios'))
		{
			var ret = this.valid_special() ;
			if(ret) return true;
			return false ;
		}
		if(this.require(ele,label_name))
			if(this.is_int(ele,label_name))
				if(this.is_decimal(ele,label_name))
				{
					var name = ele.name ;
				
					if(flag == 1)
					{	
						if(document.getElementById('cell_'+name))
							document.getElementById('cell_'+name).innerHTML = ele.options[ele.selectedIndex].text;
					}
					else
					{	
						if(document.getElementById('cell_'+name))
							document.getElementById('cell_'+name).innerHTML = ele.value ;
					}
						

					if(name =='app_name')
						document.getElementById('app_name_1').innerHTML = ele.value ;
					//if(name == 'game_cate')
						//document.getElementById('app_type_1').innerHTML = ele.options[ele.selectedIndex].text ;
					//	document.getElementById('app_type_1').innerHTML = ele.value;
					return true ;
				}
					
		return false;
	},


	valid_field_v2 : function(type,ele,label_name,flag)	//flag=1表示select
	{	

			var name = ele.name ;
		
			if(flag == 1)
			{	
				if(document.getElementById('cell_'+name))
					document.getElementById('cell_'+name).innerHTML = ele.options[ele.selectedIndex].text;
			}
			else
			{	
				if(document.getElementById('cell_'+name))
					document.getElementById('cell_'+name).innerHTML = ele.value ;
			}
				

			if(name =='app_name')
				document.getElementById('app_name_1').innerHTML = ele.value ;
			//if(name == 'game_cate')
				//document.getElementById('app_type_1').innerHTML = ele.options[ele.selectedIndex].text ;
			//	document.getElementById('app_type_1').innerHTML = ele.value;
			return true ;
	},



	valid_special : function()
	{
		var app_id_android = document.getElementById('app_id_android').value ;
		var online_time = document.getElementsByName('online_time')[0].value ;

		var app_id_ios = document.getElementById('app_id_ios').value ;
		var online_time_ios = document.getElementsByName('online_time_ios')[0].value ;
		//两个必须同时存在
		if((app_id_android =='' && online_time == '') || (app_id_android !='' && online_time !=''))
		{
			//return true ;
		}
		else
		{
			alert('安卓APPID和游戏上线时间必须同时填写或者不填写!!!') ;
			return false ;
		}

		//两个必须同时存在
		if((app_id_ios =='' && online_time_ios == '') || (app_id_ios !='' && online_time_ios !=''))
		{
			//return true ;
		}
		else
		{
			alert('IOS APPID和游戏上线时间必须同时填写或者不填写!!!') ;
			return false ;
		}

		return true ;
	},
	require : function(ele,label_name)
	{	
		if( ele.getAttribute('require') == 'true' )
		{
			if(ele.value == '')
			{	
				alert(label_name+this.tit.require) ;
			
				return false ;
			}
		}
		return true ;
	},

	is_int : function(ele,label_name)
	{	
		if(ele.getAttribute('data_type') == 'int')
		{	
			
			if(this.reg.reg_int.test(ele.value) === false)
			{
				alert(label_name+this.tit.is_int) ;
			
				return false ;
			}
		}
		return true ;
	},
	is_decimal : function(ele,label_name)
	{
		if(ele.getAttribute('data_type') == 'decimal')
		{	
			//console.log( this.reg.reg_decimal.test(ele.value) ) ;
			if(this.reg.reg_decimal.test(ele.value) === false)
			{	
				alert(label_name+this.tit.is_decimal) ;
				return false ;
			}
		}
		return true ;
	},
	reg : {
		reg_int : /^\d+$/i,
		reg_decimal : /^\d+\.\d{2}$/i
	},

	tit : {
		require : '为必填字段!!!',
		is_int : '必须是整数',
		is_decimal : '必须是decimial类型'
	}

} ;




var valid_v2 = {

	sub_valid: function(url)	//提交的所有的拥有data_type的字段
	{	

		var flag = true ;
		var inputs = document.getElementsByTagName("input") ;
	
		for(var i=0,len=inputs.length;i<len;i++)
		{	
			if(inputs[i].getAttribute('data_type') != null)
			{	
				if(!this.valid_field(inputs[i].getAttribute('data_type'),inputs[i],inputs[i].getAttribute('zh')))
					flag = false ;
			}
				
		}


		if(flag)
		{
			var args = get_post_args() ;
			$.post(
				url,
				args,
				function(data)
				{
					alert(data.msg) ;
				},
				'json'
				) ;
		}
		
		return flag ;
	},
	valid_field : function(type,ele,label_name,flag)	//flag=1表示select
	{	
		//检查APPID和游戏上线时间两个必须同时存在，不然就不给予提交
		
		if((ele.name == 'app_id_android' || ele.name == 'online_time') || (ele.name=='app_id_ios' || ele.name == 'online_time_ios'))
		{
			var ret = this.valid_special() ;
			//console.log(ret + typeof ret);
			if(ret) return true;
			return false ;
		}
		if(this.require(ele,label_name))
			if(this.is_int(ele,label_name))
				if(this.is_decimal(ele,label_name))
				{
					var name = ele.name ;
				
					if(flag == 1)
					{	
						if(document.getElementById('cell_'+name))
							document.getElementById('cell_'+name).innerHTML = ele.options[ele.selectedIndex].text;
					}
					else
					{	
						if(document.getElementById('cell_'+name))
							document.getElementById('cell_'+name).innerHTML = ele.value ;
					}
						

					if(name =='app_name')
						document.getElementById('app_name_1').innerHTML = ele.value ;
					//if(name == 'game_cate')
						//document.getElementById('app_type_1').innerHTML = ele.options[ele.selectedIndex].text ;
					//	document.getElementById('app_type_1').innerHTML = ele.value;
					return true ;
				}
					
		return false;
	},


	valid_field_v2 : function(type,ele,label_name,flag)	//flag=1表示select
	{	

			var name = ele.name ;
		
			if(flag == 1)
			{	
				if(document.getElementById('cell_'+name))
					document.getElementById('cell_'+name).innerHTML = ele.options[ele.selectedIndex].text;
			}
			else
			{	
				if(document.getElementById('cell_'+name))
					document.getElementById('cell_'+name).innerHTML = ele.value ;
			}
				

			if(name =='app_name')
				document.getElementById('app_name_1').innerHTML = ele.value ;
			//if(name == 'game_cate')
				//document.getElementById('app_type_1').innerHTML = ele.options[ele.selectedIndex].text ;
			//	document.getElementById('app_type_1').innerHTML = ele.value;
			return true ;
	},



	valid_special : function()
	{
		var app_id_android = document.getElementById('app_id_android').value ;
		var online_time = document.getElementsByName('online_time')[0].value ;

		//var app_id_ios = document.getElementById('app_id_ios').value ;
		//var online_time_ios = document.getElementsByName('online_time_ios')[0].value ;
		//两个必须同时存在
		/*console.log(app_id_android + typeof app_id_android);
		console.log(online_time + typeof online_time);*/
		if(app_id_android != '' || online_time != '')
		{	
			if(app_id_android && online_time)
			{

			}
			else
			{
				alert('安卓APPID和游戏上线时间必须同时填写或者不填写!!!') ;
				return false;
			}
			
			
		}
		

		//两个必须同时存在
		/*if((app_id_ios =='' && online_time_ios == '') )
		{
			//return true ;
		}
		else
		{
			alert('IOS APPID和游戏上线时间必须同时填写或者不填写!!!') ;
			return false ;
		}*/

		return true ;
	},
	require : function(ele,label_name)
	{	
		if( ele.getAttribute('require') == 'true' )
		{
			if(ele.value == '')
			{	
				alert(label_name+this.tit.require) ;
			
				return false ;
			}
		}
		return true ;
	},

	is_int : function(ele,label_name)
	{	
		if(ele.getAttribute('data_type') == 'int')
		{	
			
			if(this.reg.reg_int.test(ele.value) === false)
			{
				alert(label_name+this.tit.is_int) ;
			
				return false ;
			}
		}
		return true ;
	},
	is_decimal : function(ele,label_name)
	{
		if(ele.getAttribute('data_type') == 'decimal')
		{	
			//console.log( this.reg.reg_decimal.test(ele.value) ) ;
			if(this.reg.reg_decimal.test(ele.value) === false)
			{	
				alert(label_name+this.tit.is_decimal) ;
				return false ;
			}
		}
		return true ;
	},
	reg : {
		reg_int : /^\d+$/i,
		reg_decimal : /^\d+\.\d{2}$/i
	},

	tit : {
		require : '为必填字段!!!',
		is_int : '必须是整数',
		is_decimal : '必须是decimial类型'
	}

} ;



function change_value(name,obj)
{	
	if(document.getElementsByName(name)[0].checked == true)
	{
		document.getElementsByName(name)[0].click() ;
	}
	document.getElementsByName(name)[0].value  = obj.value;
	document.getElementsByName(name)[0].click() ;
}



    function create_field(obj,box_id,flag,position,readonly)	//flag=0添加 flag=1编辑 //flag2代表输出特殊的部分
    {   

        var html = '<ul>' ;
        for(field_name in obj)
        {   

            var valid_html = '' ;
            for(attr in obj[field_name]['valid'])
            {
                if(attr != 'myunique')
                {
                   valid_html += attr+'='+obj[field_name]['valid'][attr]+' ' ;
                }
            }
            var only = '';
            if(readonly == '1')
            	only = 'disabled="disabled"' ;

            //限制两个字段不能修改，是李彤要求的
            if(field_name == 'principal' || field_name == 'developers' || field_name == 'game_cat_big')
            	only = 'disabled="disabled"' ;

            switch(obj[field_name].type)
            {   

                case 'text':
                	if((field_name == 'app_id_android' || field_name == 'app_id_ios') && flag == 0)
                	{

                	}
                	else
                	{	
                		//if(field_name == 'app_id' || field_name == 'app_id_ios')
                		//	html += "<li id='"+field_name+"_special' style='width:100%;border-top:1px solid #DDD;height:40px;line-height:40px;'>"+obj[field_name].remarks+"</li>" ;
                		//onblur=\"valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)\"

                		if(obj[field_name].position == position)
                			html += "<li><span>"+obj[field_name].name+"：</span><input type='text' name='"+field_name+"' "+only+" zh='"+obj[field_name].name+"' id='"+field_name+"' class='form-control' onblur=\"valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)\" value='"+obj[field_name].data+"' "+valid_html+" /></li>" ; 
                	}
                    	  
                    break;
                case 'select':
                    var option = '<option value="0">请选择</option>' ;

                    for(gameid in obj[field_name]['select'])
                    {	
                    	select_str = (gameid == obj[field_name]['data']) ? 'selected' :'' ;
                        option += '<option value="'+gameid+'" '+select_str+' zh="'+obj[field_name]['select'][gameid]+'">'+obj[field_name]['select'][gameid]+'</option>' ;
                    }

                    //onchange=\"valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',1)\"
                    if(obj[field_name].position == position)
                    html += "<li><span>"+obj[field_name].name+"：</span><select "+valid_html+" name='"+field_name+"' "+only+" onchange=\"valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',1)\" id='"+field_name+"' >"+option+"</select></li>" ;
                    break;
                case 'date':

                	if( (field_name == 'online_time' || field_name =='online_time_ios') && flag == 0)
                	{

                	}
                	else
                	{	
                		//valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)
                		if(obj[field_name].position == position)
                    	html += "<li><span>"+obj[field_name].name+"：</span><input type='text' name='"+field_name+"' "+only+" style='width: 200px;height:32px;border:1px solid #BBB' "+valid_html+" class='form-control Wdate' value='"+obj[field_name].data+"'  onfocus=\"WdatePicker({onpicked:function(dp){valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)}})\" /> </li>" ;
                    }
                    break;
            } 
        }
    	html += '<div class="clearfix"></div>' ;
     document.getElementById(box_id).innerHTML = html;

    }


    function create_field_v2(obj,box_id,flag,position,readonly)	//flag=0添加 flag=1编辑 //flag2代表输出特殊的部分
    {   

        var html = '<ul>' ;
        for(field_name in obj)
        {   

            var valid_html = '' ;
            for(attr in obj[field_name]['valid'])
            {
                if(attr != 'myunique')
                {
                   valid_html += attr+'='+obj[field_name]['valid'][attr]+' ' ;
                }
            }
            var only = '';
            if(readonly == '1')
            	only = 'disabled="disabled"' ;

            //限制两个字段不能修改，是李彤要求的
            //if(field_name == 'principal' || field_name == 'developers' || field_name == 'game_cat_big')
            //	only = 'disabled="disabled"' ;

            switch(obj[field_name].type)
            {   

                case 'text':
                	if((field_name == 'app_id_android' || field_name == 'app_id_ios') && flag == 0)
                	{

                	}
                	else
                	{	
                		//if(field_name == 'app_id' || field_name == 'app_id_ios')
                		//	html += "<li id='"+field_name+"_special' style='width:100%;border-top:1px solid #DDD;height:40px;line-height:40px;'>"+obj[field_name].remarks+"</li>" ;
                		//onblur=\"valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)\"

                		if(obj[field_name].position == position)
                			html += "<li><span>"+obj[field_name].name+"：</span><input type='text' name='"+field_name+"' "+only+" zh='"+obj[field_name].name+"' id='"+field_name+"' class='form-control' onblur=\"valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)\" value='"+obj[field_name].data+"' "+valid_html+" /></li>" ; 
                	}
                    	  
                    break;
                case 'select':
                    var option = '<option value="0">请选择</option>' ;

                    for(gameid in obj[field_name]['select'])
                    {	
                    	select_str = (gameid == obj[field_name]['data']) ? 'selected' :'' ;
                        option += '<option value="'+gameid+'" '+select_str+' zh="'+obj[field_name]['select'][gameid]+'">'+obj[field_name]['select'][gameid]+'</option>' ;
                    }

                    //onchange=\"valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',1)\"
                    if(obj[field_name].position == position)
                    html += "<li><span>"+obj[field_name].name+"：</span><select "+valid_html+" name='"+field_name+"' "+only+" onchange=\"valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',1)\" id='"+field_name+"' >"+option+"</select></li>" ;
                    break;
                case 'date':

                	if( (field_name == 'online_time' || field_name =='online_time_ios') && flag == 0)
                	{

                	}
                	else
                	{	
                		//valid.valid_field('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)
                		if(obj[field_name].position == position)
                    	html += "<li><span>"+obj[field_name].name+"：</span><input type='text' name='"+field_name+"' "+only+" style='width: 200px;height:32px;border:1px solid #BBB' "+valid_html+" class='form-control Wdate' value='"+obj[field_name].data+"'  onfocus=\"WdatePicker({onpicked:function(dp){valid.valid_field_v2('"+obj[field_name].type+"',this,'"+obj[field_name].name+"',0)}})\" /> </li>" ;
                    }
                    break;
            } 
        }
    	html += '<div class="clearfix"></div>' ;
     document.getElementById(box_id).innerHTML = html;

    }


    var product_v2 = {

		update_opt:function(ele,level_json)
		{	
			
			//console.log(level_json.length) ;
			var rate = ele.getAttribute('rate') ;
			var score = ele.value ;
            score = score.toString() ;
            if(/^\d{1,3}$/.test(score) || /^\d+\.\d{1,2}$/.test(score))
            {
                //var ret =parseFloat((score * rate).toFixed(1)) ;
                var ret =parseFloat(score * rate) ;
                var bind_opt = ele.getAttribute('bind_opt') ;

                var cur_val = parseFloat(document.getElementById(bind_opt).getAttribute('data')) ;


                if(ele.checked == true)
                {
                    document.getElementById(bind_opt).innerHTML = (cur_val + ret).toFixed(1) ;
                    document.getElementById(bind_opt).setAttribute('data',(cur_val + ret)) ;
                }
                else
                {
                    document.getElementById(bind_opt).innerHTML = (cur_val - ret).toFixed(1) ;
                    document.getElementById(bind_opt).setAttribute('data',(cur_val - ret)) ;
                }


                var total_score = this.calcuate_score() ;
                document.getElementById('total_score').innerHTML = total_score ;

                var level = this.calcuate_level(total_score,level_json) ;

                document.getElementById('product_level').innerHTML = level ;
            }

		},
		calcuate_score: function()
		{
			var zhuceqidong = parseFloat(document.getElementById('zhuceqidong').innerHTML ) ;
			var liucun = parseFloat(document.getElementById('liucun').innerHTML ) ;
			var fufeilv = parseFloat(document.getElementById('fufeilv').innerHTML ) ;
			var qita = parseFloat(document.getElementById('qita').innerHTML ) ;

			return (zhuceqidong + liucun + fufeilv + qita).toFixed(1) ;
		},
		calcuate_level : function(score,level_json)
		{	

			if(score == '') return false ;
			if(typeof level_json != 'object' || level_json == '') 
				return false ;

			for(level in level_json)	//计算等级
			{	
				

				if(score >= level_json[level]['min'] && score < level_json[level]['max'])
					return level ;
	
			}
		}
	};

	var product = {

		update_opt:function(ele,level_json)
		{	
			
			//console.log(level_json.length) ;
			var rate = ele.getAttribute('rate') ;
			var score = ele.value ;
            score = score.toString() ;
            if(/^\d{1,3}$/.test(score) || /^\d+\.\d{1,2}$/.test(score))
            {
                //var ret =parseFloat((score * rate).toFixed(1)) ;
                var ret =parseFloat(score * rate) ;
                var bind_opt = ele.getAttribute('bind_opt') ;

                var cur_val = parseFloat(document.getElementById(bind_opt).getAttribute('data')) ;


                if(ele.checked == true)
                {
                    document.getElementById(bind_opt).innerHTML = (cur_val + ret).toFixed(1) ;
                    document.getElementById(bind_opt).setAttribute('data',(cur_val + ret)) ;
                }
                else
                {
                    document.getElementById(bind_opt).innerHTML = (cur_val - ret).toFixed(1) ;
                    document.getElementById(bind_opt).setAttribute('data',(cur_val - ret)) ;
                }


                var total_score = this.calcuate_score() ;
                document.getElementById('total_score').innerHTML = total_score ;

                var level = this.calcuate_level(total_score,level_json) ;

                document.getElementById('product_level').innerHTML = level ;
            }

		},
		calcuate_score: function()
		{
			var chanpinxiliang = parseFloat(document.getElementById('chanpinxiliang').innerHTML ) ;
			var yonghutiyan = parseFloat(document.getElementById('yonghutiyan').innerHTML ) ;
			var youxifufei = parseFloat(document.getElementById('youxifufei').innerHTML ) ;
			var youxichuangxin = parseFloat(document.getElementById('youxichuangxin').innerHTML ) ;

			return (chanpinxiliang + yonghutiyan + youxifufei + youxichuangxin).toFixed(1) ;
		},
		calcuate_level : function(score,level_json)
		{	

			if(score == '') return false ;
			if(typeof level_json != 'object' || level_json == '') 
				return false ;

			for(level in level_json)	//计算等级
			{	
				

				if(score >= level_json[level]['min'] && score < level_json[level]['max'])
					return level ;
	
			}
		}
	};


//自适应textarea的高度
function ResizeTextarea(a,row){
    var agt = navigator.userAgent.toLowerCase();
    var is_op = (agt.indexOf("opera") != -1);
    var is_ie = (agt.indexOf("msie") != -1) && document.all && !is_op;
    if(!a){return}
    if(!row)
        row=5;
    var b=a.value.split("\n");
    var c=is_ie?1:0;
    c+=b.length;
    var d=a.cols;
    if(d<=20){d=40}
    for(var e=0;e<b.length;e++){
        if(b[e].length>=d){
            c+=Math.ceil(b[e].length/d)
        }
    }
    c=Math.max(c,row);
    if(c!=a.rows){
        a.rows=c;
    }
}

    function change_youshi_value(obj,ele_name)
    {      
       if(ele_name == '') return false ;
        document.getElementsByName(ele_name)[0].value = obj.value ;
    }

function auto_check(name)
{
	var check = document.getElementsByName(name)[0].checked ;
	if(check == false)
		document.getElementsByName(name)[0].click(); 
}


function get_score()
{	
	var inputs = $("#option_box").find(":checkbox") ;

	var score_json = {
		chanpinxiliang : 0,
		yonghutiyan	 : 0,
		youxifufei	 : 0,
		youxichuangxin : 0
	} ;

	$.each(inputs,function(i,item){
		if(item.checked == true)
		{
			var score = item.value ;
			var rate = item.getAttribute('rate') ;
			var total = parseFloat((score * rate)) ;
			var bind_opt = item.getAttribute('bind_opt') ;
			score_json[bind_opt] += total ;
		}
		
	}) ;
	
	var chanpinxiliang = parseFloat(score_json['chanpinxiliang']) ;
	var yonghutiyan = parseFloat(score_json['yonghutiyan']) ;
	var youxifufei = parseFloat(score_json['youxifufei']) ;
	var youxichuangxin = parseFloat(score_json['youxichuangxin']) ;

	var total_score = chanpinxiliang + yonghutiyan + youxifufei + youxichuangxin ;

	var ret= {
		chanpinxiliang : chanpinxiliang,
		yonghutiyan	 : yonghutiyan,
		youxifufei	 : youxifufei,
		youxichuangxin : youxichuangxin,
		total_score : total_score
	}

	return ret ;
}

function get_score_v2()
{	
	var inputs = $("#option_box").find(":checkbox") ;

	var score_json = {
		zhuceqidong : 0,
		liucun	 : 0,
		fufeilv	 : 0,
		qita : 0
	} ;

	$.each(inputs,function(i,item){
		if(item.checked == true)
		{
			var score = item.value ;
			var rate = item.getAttribute('rate') ;
			var total = parseFloat((score * rate)) ;
			var bind_opt = item.getAttribute('bind_opt') ;
			score_json[bind_opt] += total ;
		}
		
	}) ;
	
	var zhuceqidong = parseFloat(score_json['zhuceqidong']) ;
	var liucun = parseFloat(score_json['liucun']) ;
	var fufeilv = parseFloat(score_json['fufeilv']) ;
	var qita = parseFloat(score_json['qita']) ;

	var total_score = zhuceqidong + liucun + fufeilv ;

	var ret= {
		zhuceqidong : zhuceqidong,
		liucun	 : liucun,
		fufeilv	 : fufeilv,
		qita : qita,
		total_score : total_score
	}

	return ret ;
}


function update_score()
{	

	var json = get_score() ;
	//产品吸量
	document.getElementById('chanpinxiliang').setAttribute('data',json['chanpinxiliang']) ;
	document.getElementById('chanpinxiliang').innerHTML = json['chanpinxiliang'].toFixed(1);
	//用户体验
	document.getElementById('yonghutiyan').setAttribute('data',json['yonghutiyan']) ;
	document.getElementById('yonghutiyan').innerHTML = json['yonghutiyan'].toFixed(1);
	//游戏付费
	document.getElementById('youxifufei').setAttribute('data',json['youxifufei']) ;
	document.getElementById('youxifufei').innerHTML = json['youxifufei'].toFixed(1);
	//游戏创新
	document.getElementById('youxichuangxin').setAttribute('data',json['youxichuangxin']) ;
	document.getElementById('youxichuangxin').innerHTML = json['youxichuangxin'].toFixed(1);
	//总分
	document.getElementById('total_score').innerHTML = json['total_score'].toFixed(1) ;
	
}

function update_score_v2()
{	

	var json = get_score_v2() ;
	//注册启动
	document.getElementById('zhuceqidong').setAttribute('data',json['zhuceqidong']) ;
	document.getElementById('zhuceqidong').innerHTML = json['zhuceqidong'].toFixed(1);
	//留存
	document.getElementById('liucun').setAttribute('data',json['liucun']) ;
	document.getElementById('liucun').innerHTML = json['liucun'].toFixed(1);
	//付费渗透率
	document.getElementById('fufeilv').setAttribute('data',json['fufeilv']) ;
	document.getElementById('fufeilv').innerHTML = json['fufeilv'].toFixed(1);
	//其他
	document.getElementById('qita').setAttribute('data',json['qita']) ;
	document.getElementById('qita').innerHTML = json['qita'].toFixed(1);
	//总分
	document.getElementById('total_score').innerHTML = json['total_score'].toFixed(1) ;
	
}

 function my_show(obj)
{
   $('.image_preview').bind('click',function(){
            var url = $(this).find('img').attr('src') ;
            var imgobj = document.createElement('img') ;
            imgobj.src = url ;
            var real_width = imgobj.width;
            var real_height = imgobj.height ;
            var w_width = $(window).width() ;
            var w_height = $(window).height() ;
            if((real_width >= w_width) || (real_height) >=w_height)
            {
            	real_width = w_width - 100 ;
            	real_height = w_height - 100 ;
            }

            $('#img_source').width(real_width-30) ;
            $('#img_source').height(real_height-30) ;
            $('#myModal .modal-dialog').width(real_width) ;
            $('#img_source').attr('src',url) ;
             $('#myModal').modal('show'); 
    })
}


    //获取字符长度
    function get_strlen(str)
    {
        if(typeof str != 'string')
            return 0 ;
        var len = 0 ;
        if(str.charCodeAt(0) >97)
            len += 2 ;
        else
            len ++ ;
        return len ;
    }

    function remove_img(obj,app_id,img_id)
    {	
    	if(!confirm('确定删除图片?'))
    		return false ;
    	var $obj = $(obj) ;
    	var html = $obj.parent().remove() ;
    	if(img_id != 0)
    	{
    		var imgstr = img_id.toString() ;
    		if(imgstr.indexOf('image_') === -1)
    			img_id = 'image_'+img_id ;
    	}
    	//发送ajax请求来删除图片
    	if(app_id !=0 && img_id !=0)
    	{
    		$.post(
    		'/data/evaluate/edit',
    		{is_remove:1,app_id:app_id,img_id:img_id},
    		function(data)
    		{

    		},
    		'html'
    		) ;
    	}
    	
    }


    var finance_sr = {
        show_detail:function(id)
        {
            $('.tr_'+id).css({"display":"table-row"});
            $('#btn_box_'+id).css({"display":"none"});
        },
        show_detail_v2:function(id,rows)
        {	
        	$('.tr_'+id).css({"display":"table-row"});
            $('#btn_box_'+id).css({"display":"none"});
            //将colsrow属性改掉
         
            $(".row_num_"+id).attr('rowspan',rows);
        },
        show_detail_v3:function(order_id,rows)
        {//1.获取本order_id 的数据,添加到指定的行下面
        	var order = $('#order').val();
        	var sort = $('#sort').val();
        	$('#btn_box_'+order_id).click(function(){
        			var len = $('.tr_'+order_id).length;
        			
        			if(len == 0)
        			{
        				$.post(
		        		'/finance/income/get_part_two',
		        		{order_id:order_id,order:order,sort:sort},
		        		function(data)
		        		{
		        			if(data.status == 1) //添加到那一行表格下面
		        			{	
		        				$('#btn_box_'+order_id).css({"display":"none"});
		        				$('.row_num_'+order_id).attr('rowspan',rows);
		        				$('#btn_box_'+order_id).after(data.msg);
		        			}
		        			else
		        			{
		        				alert(data.msg);
		        			}
		        		},
		        		'json'
		        		);
        			}
        			else
        			{
        				finance_sr.show_detail_v2(order_id,rows);
        			}
        			
        	})
        	

        },
        hide_detail:function(id)
        {
        	$('.tr_'+id).css({"display":"none"});
            $('#btn_box_'+id).css({"display":"table-row"});
        },
        hide_detail_v2:function(id)
        {
        	$('.tr_'+id).css({"display":"none"});
            $('#btn_box_'+id).css({"display":"table-row"});
             $(".row_num_"+id).attr('rowspan',10);
        },
        hide_detail_v3:function(id)
        {
        	$('.tr_'+id).remove();
            $('#btn_box_'+id).css({"display":"table-row"});
             $(".row_num_"+id).attr('rowspan',10);
        }
    }



function upload_callback(result, file_url, element_id)
{

    var result = decodeURI(result);
    eval("var result_row=("+result+");");
    var result = result_row.result;
    var msg = result_row.msg;

	if(typeof(file_url) != 'undefined')
	{
		$("#"+element_id).val(file_url);
	}



    if(result == 1)
    {
		if(msg.length > 0)
		{
			msg_tip(msg, 'icon1');
		}
    }
    else if(result == 0)
    {
        msg_tip(msg)
    }
    else
    {
        msg_tip('服务器返回异常');
    }
}


function msg_tip(notice,class_name,ms)
{
    if (typeof(class_name) == "undefined" )class_name = 'icon2';
    $(document.body).append('<div class="operate"><div class="bg_l ' + class_name + '"></div><div class="text_mes">' + notice + '</div><div class="bg_r"></div></div>').show();
    setTimeout(function(){$(".operate").remove()}, ms || 2000);
}
