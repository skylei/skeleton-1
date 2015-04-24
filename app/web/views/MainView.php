<?php
/**
 * @Author:       wonli <wonli@live.com>
 */
namespace app\web\views;

use Cross\MVC\View;

class MainView extends View
{
    /**
     * 默认视图控制器
     *
     * @param array $data
     */
    function index($data = array())
    {
        $this->renderTpl('main/index', $data);
    }
}
