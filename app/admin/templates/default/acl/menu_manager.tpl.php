<form class="pure-form" action="" method="post">
    <table>
        <?php
        if (! empty($data)) {
            foreach ($data as $menu) {
                ?>
                <tr>
                    <td>
                        <?php echo $menu["name"] ?>
                        <span style="margin-right:20px;"> ( <?php echo $menu["link"] ?> )
                        </span>
                    </td>

                    <td style="margin-left:30px;">
                        <table class="pure-table pure-table-horizontal">
                            <tr>
                                <th style="height:30px;width:120px;">方法名称</th>
                                <th style="width:150px;">名称</th>
                                <th style="width:50px;">是否显示</th>
                                <th style="height:30px;">排序</th>
                            </tr>

                            <?php if (!empty($menu["method"])) {
                                foreach ($menu["method"] as $m => $set)
                                {
                                    ?>
                                    <tr>
                                        <td style="width:120px;text-align: left"><?php echo $m ?></td>
                                        <td>
                                            <input type="text"
                                                   name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][name]" id=""
                                                   value="<?php $this->e($set, 'name') ?>" title="action name"/>
                                        </td>
                                        <td>
                                            <input type="checkbox"
                                                   name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][display]"
                                                   <?php if (isset($set["display"]) && $set["display"] == 1) : ?>checked<?php endif; ?>
                                                   id="" title="is display"/>
                                        </td>
                                        <td>
                                            <input type="text"
                                                   name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][order]"
                                                   <?php if (!empty($set["order"])) : ?>value="<?php echo $set["order"]; ?>"<?php endif; ?>
                                                   style="width:50px;" title="display order"/>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } ?>
                        </table>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <tr>
            <td></td>
            <td colspan="2">
                <input class="pure-button" style="" type="submit" value="提交"/>
            </td>
        </tr>
    </table>
</form>
