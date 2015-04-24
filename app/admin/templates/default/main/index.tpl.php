<div>
    <form class="pure-form" method="post" action="">
        <fieldset class="pure-group">
            <div class="pure-u-1">
                <input type="text" class="pure-input-1" placeholder="登录名" name="user" required>
                <input type="password" class="pure-input-1" placeholder="密码" name="pwd" required>
            </div>
        </fieldset>

        <fieldset class="pure-group">
            <div class="pure-u-1">
                <input type="text" class="pure-input-1" name="v" value="<?php echo $data['v'] ?>" readonly/>
                <input type="text" class="pure-input-1" placeholder="请输入密保卡坐标上对应的字符" name="vv"/>
            </div>
        </fieldset>

        <fieldset class="pure-group">
            <button type="submit" class="pure-button pure-input-1 pure-button-primary">登录</button>
            <div class="pure-form-message"
                 style="color:#b94a48"><?php echo isset($data['message']) ? $data['message'] : '' ?></div>
        </fieldset>
    </form>
</div>

