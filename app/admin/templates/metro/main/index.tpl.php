<form class="login-form" action="" method="post" novalidate="novalidate">
    <h3 class="form-title">登录</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
			<span><?php echo isset($data['message']) ? $data['message'] : '' ?></span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">用户名</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="user"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">密码</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="密码" name="pwd"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">密保卡坐标</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" value="<?php echo $data['v'] ?>" autocomplete="off" name="v"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">密保卡</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="请输入密保卡密码" name="vv"/>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">提交</button>
    </div>
    <div class="pure-form-message"
         style="color:#b94a48"><?php echo isset($data['message']) ? $data['message'] : '' ?></div>
</form>
