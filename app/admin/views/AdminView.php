<?php

/**
 * @Author: wonli <wonli@live.com>
 */
namespace app\admin\views;

use Cross\Core\Loader;
use Cross\MVC\View;

class AdminView extends View
{
    /**
     * @var array
     */
    private $nav_menu;

    /**
     * @var array
     */
    private $menu_data;

    /**
     * @var array
     */
    private $all_menu;

    /**
     * 输出消息
     *
     * @param $code
     */
    function notice($code)
    {
        $code_text = Loader::read("::config/notice.config.php");
        if (isset($code_text[$code])) {
            echo $code_text[$code];
        } else {
            echo '未指明的错误识别码'.$code;
        }
    }

    /**
     * 返回菜单
     *
     * @return array
     */
    function getMenu()
    {
        return $this->menu_data;
    }

    /**
     * 导航菜单数据
     *
     * @return array
     */
    function getNavMenu()
    {
        return $this->nav_menu;
    }

    /**
     * 获取所有菜单数据
     *
     * @return mixed
     */
    function getAllMenu()
    {
        return $this->all_menu;
    }

    /**
     * 设置导航菜单
     *
     * @param $nav_data
     */
    function setNavMenu($nav_data)
    {
        $this->nav_menu = $nav_data;
    }

    /**
     * 设置菜单
     *
     * @param $data
     */
    function setMenu($data)
    {
        $this->menu_data = $data;
    }

    /**
     * 设置所有菜单数据
     *
     * @param array $menu
     * @param array $menu_icon
     */
    function setAllMenu($menu, $menu_icon = array())
    {
        foreach($menu as $name => & $m) {
            if (isset($menu_icon[$name])) {
                $m ['icon'] = $menu_icon[$name];
            }

            foreach($m['child_menu'] as $id => $mc) {
                if ($mc['display'] != 1) {
                    unset($m['child_menu'][$id]);
                }
            }
        }

        $this->all_menu = $menu;
    }

    /**
     * 分页方法
     *
     * @param $page
     * @param string $tpl
     */
    function page($page, $tpl = 'page')
    {
        list($controller, $params) = $page['link'];

        $_dot = isset($page['dot']) ? $page["dot"] : $this->config->get('url', 'dot');
        include $this->tpl("page/{$tpl}");
    }
}
