<form class="form" action="" method="post">
    <table class="table">
        <tr>
            <td></td>
            <td colspan="2">
                <input class="pure-button" style="" type="submit" value="提交"/>
            </td>
        </tr>
        <?php foreach ($menu_list as $menu) : ?>
            <tr>
                <td style="width:150px;">
                    <?php echo $menu["name"] ?>
                    <span style="margin-right:20px;">
					( <?php echo $menu["link"] ?> )
				    </span>
                </td>
                <td style="margin-left:30px;">
                    <table class="table">
                        <tr>
                            <th style="width:260px;">Action</th>
                            <th style="width:200px;">菜单名称</th>
                            <th style="width:100px;">是否显示</th>
                            <th>显示顺序</th>
                        </tr>
                        <?php if (!empty($menu["method"])) : ?>
                            <?php foreach ($menu["method"] as $m => $set) : ?>
                                <tr>
                                    <td style="width:120px;"><?php echo $m ?></td>
                                    <td><input type="text"
                                               name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][name]" id=""
                                               value="<?php if (isset($set["name"])) {
                                                   echo $set["name"];
                                               } ?>"/></td>
                                    <td><input type="checkbox"
                                               name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][display]"
                                               <?php if (isset($set["display"]) && $set["display"] == 1) : ?>checked<?php endif; ?>
                                               id=""/></td>
                                    <td><input type="text"
                                               name="menu[<?php echo $menu["id"] ?>][<?php echo $m ?>][order]"
                                               <?php if (!empty($set["order"])) : ?>value="<?php echo $set["order"]; ?>"<?php endif; ?>
                                               style="width:50px;"/></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td></td>
            <td colspan="2">
                <input class="pure-button" style="" type="submit" value="提交"/>
            </td>
        </tr>
    </table>
</form>


