<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>CP Panel</title>
    <link rel="stylesheet" href="<?php echo $this->res("css/pure-mine-skin.css") ?>">
    <link rel="stylesheet" href="<?php echo $this->res("css/login.css") ?>">
</head>
<body>
<div class="pure-skin-mine pure-g" style="text-align: center;margin:0 auto;">
    <div class="pure-u-1 head"></div>
    <div class="pure-u-1" style="margin-top: 120px;">
        <div class="login-form">
            <div class="pure-u-1">
                <img src="<?php echo $this->res("images/logo.png") ?>" alt="cross php framework" style="width:200px;"/>
            </div>

            <div class="pure-u-1" style="margin-top: 10px;">
                <?php
                echo empty($content) ? '暂无内容' : $content;
                if ($this->data['status'] != 1) {
                    $this->notice($this->data['status']);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
