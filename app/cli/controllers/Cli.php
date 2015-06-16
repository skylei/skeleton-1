<?php
/**
 * @Auth: wonli <wonli@live.com>
 * skeleton
 */
namespace app\cli\controllers;

use Cross\MVC\Controller;

/**
 * @Auth: wonli <wonli@live.com>
 * Class Cli
 * @package app\cli\controllers
 */
abstract class Cli extends Controller
{
    function __construct()
    {
        parent::__construct();
        //请在这里处理$this->params传递过来的参数
    }
}
