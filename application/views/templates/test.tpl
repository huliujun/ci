
<div id="allpage">

    <form id="my_form" enctype="multipart/form-data" action="test" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="170000">
        <input type="hidden" name="is_import" value=0>
        <input name="myFile" type="file" id="up_load">
    </form>

    <select id="select_table"  name="table" >
        <{foreach from=$table item=v key=k}>
    <option value="<{$v}>" <{if "$v" eq $where.table}>selected<{/if}>><{$v}></option>
        <{/foreach}>
    </select>
    <input id="click_submit" type="button" name="213" value="确定">
    <script>
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
    </script>

    <div  class="cal-box" style="width:auto; padding-top:2px;height: 40px;line-height: 40px ; float:right; margin-right: 10px">
        <a type="button" class="btn btn-default" id="excel_btn1">导出excel</a>
    </div>

    <script>
        //导出excel
        $('#excel_btn1').click(function(){
            var obj = get_post_args();
            obj.download = 1;
            console.log(obj);
            create_form_v5('test/index',obj);
        });
    </script>


    <table class="table table-bordered"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>
        <{foreach from=$data.title item=item}>
        <td id="tooltip1_<{$item}>" title="<{$item}>">
            <a href="javascript:void" style="color:#0000cc;"><{$item}></a>
        </td>
        <script>
            $(function(){
                fun.show_title('tooltip1_<{$item}>');
            });
        </script>
        <{/foreach}>
    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <{foreach from=$data.data item=value  }>
        <tr>
            <{foreach from=$data.title item=v key=k }>
            <td  style="text-align:center; border:1px solid #ddd"><{$value.$k}> </td>
            <{/foreach}>
        </tr>
        <{/foreach}>
    </tbody>
    </table>

    <div id="pageSize" class="btn-group kpi-nav-one" data-toggle="buttons">
        <{foreach from=$page item=v key=k}>

        <label class="btn btn-default <{if $where.page eq $v}>active<{/if}> " >
            <input type="radio" class="page_class_<{$v}>" name="page" <{if $where.page eq $v}>checked<{/if}> value="<{$v}>"><{$v}>
        </label>
        <script>
            $('.page_class_<{$v}>').click(function(){
                $.post('/test/index',{
                    table:$('#select_table').val(),
                    page:$('.page_class_<{$v}>').val(),
                },function(data){
                    //console.log(data);
                    $('#allpage').html(data);
                });
            });
        </script>
        <{/foreach}>
    </div>

<script>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });
        fun.show_title('tooltip1');
    });
</script>
</div>

