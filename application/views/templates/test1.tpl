
<div id="allpage">
    <select id="select_table"  name="table" style="width:100px;height: 30px;" >
        <{foreach from=$data.table item=v key=k}>
    <option value="<{$v}>" <{if "$v" eq $data.where.table}>selected<{/if}>><{$v}></option>
        <{/foreach}>
    </select>
    <input id="click_submit" type="button" name="213" value="确定">
    <script>
        $('#click_submit').click(function () {
            $('#allpage').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/image/loading7.gif'></div>");
            $.post('/test/index',{
                table:$('#select_table').val(),
            },function(data){
               //console.log(data);
                $('#allpage').html(data);
            });
        });
    </script>

    <div >
    <table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>
        <{foreach from=$data.data.title item=item}>
        <td >
            <a href="javascript:void" style="color:#0000cc;"><{$item}></a>
        </td>
        <{/foreach}>
    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <{foreach from=$data.data.data item=value  }>
        <tr>
            <{foreach from=$data.data.title item=v key=k }>
            <td class="tooltip" title="<{$value.$k}>" style="text-align:center; border:1px solid #ddd"><{$value.$k}> </td>
            <{/foreach}>
        </tr>
        <{/foreach}>
    </tbody>
    </table>
    </div>
    <div id="pageSize" class="btn-group kpi-nav-one" data-toggle="buttons">
        <{foreach from=$data.page item=v key=k}>

        <label class="btn btn-default <{if $data.where.page eq $v}>active<{/if}> " >
            <input type="radio" class="page_class_<{$v}>" name="page" <{if $data.where.page eq $v}>checked<{/if}> value="<{$v}>"><{$v}>
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
        fun.show_title('tooltip');
    });
</script>
</div>

