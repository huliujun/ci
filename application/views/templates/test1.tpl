
<div id="allpage">


    <div >
    <table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>

        <td >
            <a href="javascript:void" style="color:#0000cc;"></a>
        </td>

    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <{foreach from=$data item=v key=k }>
        <tr><td class="tooltip" title="<{$v.path}>" style="text-align:center; border:1px solid #ddd"> <a href="<{$v.path}>" style="color:#0000cc;"><{$v.name}></a>   </td>
        </tr>
    <{/foreach}>
    </tbody>
    </table>
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

