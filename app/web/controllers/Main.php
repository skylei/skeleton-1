<?php
/**
 * @Author:       wonli <wonli@live.com>
 */
namespace app\web\controllers;

use Cross\Core\Delegate;

class Main extends Web
{
    /**
     * 默认控制器
     */
    function index()
    {
        $this->data ['action'] = __FUNCTION__;
        $this->data ['name_space'] = $this->getControllerNamespace();
        $this->data ['version'] = Delegate::getVersion();

        $this->display($this->data);
    }
}
