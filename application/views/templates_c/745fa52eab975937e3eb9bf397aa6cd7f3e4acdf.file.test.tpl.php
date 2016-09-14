<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-14 12:44:58
         compiled from "D:\wamp\www\test\application\views\templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1003857c2111d0de733-22983429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745fa52eab975937e3eb9bf397aa6cd7f3e4acdf' => 
    array (
      0 => 'D:\\wamp\\www\\test\\application\\views\\templates\\test.tpl',
      1 => 1473849896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1003857c2111d0de733-22983429',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57c2111d2a39a9_84228792',
  'variables' => 
  array (
    'table' => 0,
    'v' => 0,
    'where' => 0,
    'data' => 0,
    'item' => 0,
    'k' => 0,
    'value' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c2111d2a39a9_84228792')) {function content_57c2111d2a39a9_84228792($_smarty_tpl) {?>
<div id="allpage">

    <form id="my_form" enctype="multipart/form-data" action="test" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="170000">
        <input type="hidden" name="is_import" value=0>
        <input name="myFile" type="file" id="up_load">
    </form>

    <select id="select_table"  name="table" >
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (((string)$_smarty_tpl->tpl_vars['v']->value)==$_smarty_tpl->tpl_vars['where']->value['table']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
        <?php } ?>
    </select>
    <input id="click_submit" type="button" name="213" value="确定">
    <?php echo '<script'; ?>
>
        $('#select_table').bind('change',function () {
            $('#allpage').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/img/loading7.gif'></div>");
            $.post('/test/index',{
                table:$('#select_table').val(),
            },function(data){
               //console.log(data);
                $('#allpage').html(data);
            });
        });
        $('#up_load').on('change',function () {
            $('input[name=is_import]').val(1);
            var options = {
                success : dosuccess
            };

            $('#my_form').ajaxForm(options);

            function dosuccess(responseText)
            {
                $('#allpage').html(responseText);
            }
            $('#my_form').submit();
        });
    <?php echo '</script'; ?>
>

    <div  class="cal-box" style="width:auto; padding-top:2px;height: 40px;line-height: 40px ; float:right; margin-right: 10px">
        <a type="button" class="btn btn-default" id="excel_btn1">导出excel</a>
    </div>

    <?php echo '<script'; ?>
>
        //导出excel
        $('#excel_btn1').click(function(){
            var obj = get_post_args();
            obj.download = 1;
            console.log(obj);
            create_form_v5('test/index',obj);
        });
    <?php echo '</script'; ?>
>


    <table class="table table-bordered"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <td id="tooltip1_<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">
            <a href="javascript:void" style="color:#0000cc;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
        </td>
        <?php echo '<script'; ?>
>
            $(function(){
                fun.show_title('tooltip1_<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
');
            });
        <?php echo '</script'; ?>
>
        <?php } ?>
    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <tr>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <td  style="text-align:center; border:1px solid #ddd"><?php echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
    </table>

    <div id="pageSize" class="btn-group kpi-nav-one" data-toggle="buttons">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

        <label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['where']->value['page']==$_smarty_tpl->tpl_vars['v']->value) {?>active<?php }?> " >
            <input type="radio" class="page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" name="page" <?php if ($_smarty_tpl->tpl_vars['where']->value['page']==$_smarty_tpl->tpl_vars['v']->value) {?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>

        </label>
        <?php echo '<script'; ?>
>
            $('.page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
').click(function(){
                $.post('/test/index',{
                    table:$('#select_table').val(),
                    page:$('.page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
').val(),
                },function(data){
                    //console.log(data);
                    $('#allpage').html(data);
                });
            });
        <?php echo '</script'; ?>
>
        <?php } ?>
    </div>

<?php echo '<script'; ?>
>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });
        fun.show_title('tooltip1');
    });
<?php echo '</script'; ?>
>
</div>

<?php }} ?>
