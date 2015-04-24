<form class="pure-form" action="" method="post">
    <table>
        <tr>
            <td>老密码:</td>
            <td><input type="password" name="op" id=""/></td>
        </tr>
        <tr>
            <td>新密码:</td>
            <td><input type="password" name="np1" id=""/></td>
        </tr>
        <tr>
            <td>重复密码:</td>
            <td><input type="password" name="np2" id=""/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="pure-button" type="submit" value="提交"/>
                <?php
                if (! empty($data['notes']))
                {
                    echo $data['notes']['message'];
                }
                ?>
            </td>
        </tr>
    </table>
</form>
