<div class="jumbotron" style="background: url('<?php echo $this->res('images/congruent_pentagon.png') ?>')">
    <div class="container">
        <h1>Hello World</h1>
        <p>crossphp是一个轻量高效的php开发框架</p>
        <p>
            <a href="./../admin" target="_blank">后台管理demo</a>
            <a href="http://www.crossphp.com" target="_blank">框架主页</a>
        </p>
        <p>
            <a class="btn btn-primary btn-lg" href="http://document.crossphp.com" target="_blank" role="button">查看文档 »</a>
        </p>
    </div>
</div>
<div class="container">
    <?php
    if (! empty($data)) {
        printf('Version: %s<br>', $data['version']);
        printf('Namespace: %s, Action: %s<p>', $data['name_space'], $data['action']);
    }
    ?>
</div>
<div class="container">
    <footer>
        <p>© crossphp.com 2014-2015</p>
    </footer>
</div>
