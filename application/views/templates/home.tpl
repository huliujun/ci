<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/application/views/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/application/views/js/common.js"></script>
    <script type="text/javascript" src="/application/views/js/jquery.form.js"></script>
    <!--link rel="stylesheet" type="text/css" href="/application/views/js/bootstrap.min.css" /-->
    <link rel="stylesheet" type="text/css" href="/application/views/css/mystyle.css" />
    <link rel="stylesheet" type="text/css" href="/application/views/css/style.css" />
    <title>demo</title>
</head>

<body>
<div style="min-width: 1000px">
<div class="menu-box">
    <table>
        <thead>
            <tr><td>菜单</td></tr>
        </thead>
        <tbody class="sparent">
            <{foreach from = $parent_menu key = key item = item}>
                <{if $item.show == 1}><tr class="parent" id="row_<{$item.id}>"><td><{$item.filename}></td></tr>
                <{foreach from = $child_menu key = k item = i}>
                <{if $i.show == 1 and $i.parent_id == $item.id}>
                <tr class="child_row_<{$item.id}>" id="c_r_<{$i.id}>"><td><{$i.filename}></td></tr>
                <script>
                    $('#c_r_<{$i.id}>').click(function () {
                        $.post('<{$i.filepath}>',{
                        },function(data){
                            console.log(123);
                            $('#ajaxnode').html(data);
                        });
                    });
                </script>
                <{/if}>
                <{/foreach}>
                <{/if}>
            <{/foreach}>
        </tbody>
    </table>
    <script>
        $(function () {
            $('tr.parent').click(function () {
                $(this)
                        .toggleClass('selected')
                        .siblings('.child_'+this.id).toggle();
            }).click();
        });
    </script>
</div>

<div class="table-box" style="height: auto; width: 75%;">

    <div id="ajaxnode">

    </div>
    <script>
        $('#ajaxnode').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/image/loading7.gif'></div>");
        $.post('/test',{
        },function(data){
            $('#ajaxnode').html(data);
        });
    </script>
</div>
</div>
</body>
</html>