<table class="table">
    <tr>
        <th>类名</th>
        <th>方法列表</th>
    </tr>
    <?php foreach ($menu_list as $l) : ?>
        <tr>
            <td align="left">
                <label>
                    <?php if (isset($menu_select) && in_array($l['id'], $menu_select)) : ?>
                        <input type="checkbox" checked onclick="sele(this)"
                               class="<?php echo "token_{$l['link']}_class" ?>" value="<?php echo $l['id'] ?>"
                               name="menu_id[]" id=""/>
                    <?php else : ?>
                        <input type="checkbox" onclick="sele(this)" class="<?php echo "token_{$l['link']}_class" ?>"
                               value="<?php echo $l['id'] ?>" name="menu_id[]" id=""/>
                    <?php endif ?>

                    <?php echo $l ['name'] ?>
                </label>
            </td>
            <td>
                <div>
                        <?php
                        if (isset($l['method'])) {
                            foreach ($l['method'] as $link => $m) {

                                if (! empty($m)) {
                                    ?>
                                    <span style="float:left;text-align:center">
                                        <label>
                                            <?php if (isset($menu_select) && in_array($m['id'], $menu_select)) : ?>
                                                <input checked class="<?php echo "token_{$l['link']}_class_children" ?>"
                                                       type="checkbox" value="<?php echo $m['id'] ?>" name="menu_id[]"/>
                                            <?php else : ?>
                                                <input class="<?php echo "token_{$l['link']}_class_children" ?>"
                                                       type="checkbox" value="<?php echo $m['id'] ?>" name="menu_id[]"/>
                                            <?php endif ?>

                                            <?php echo empty($m['name']) ? "*{$link}" : $m['name'] ?>
                                        </label>
                                    </span>
                                    <?php
                                }
                            }
                        }
                        ?>
                </div>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<script type="text/javascript">
    function sele(o) {
        var token_name = $(o).attr('class');
        $("." + token_name + "_children").each(function () {
            $(this).attr("checked", !!($(o).attr('checked') == 'checked'));
        })
    }
</script>
