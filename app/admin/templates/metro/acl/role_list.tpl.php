<form class="form" action="" method="post">
    <table class="table">
        <?php foreach ($data['role_list'] as $r) : ?>
            <tr>
                <td><?php echo $r['name'] ?></td>
                <td><a href="<?php echo $this->link("acl:editRole", array('rid'=>$r['id'])) ?>">编辑</a></td>
            </tr>
        <?php endforeach ?>
    </table>
</form>
<script type="text/javascript">
    function sele(o) {
        var token_name = $(o).attr('class');
        $("." + token_name + "_children").each(function () {
            $(this).attr("checked", !!($(o).attr('checked') == 'checked'));
        })
    }
</script>
