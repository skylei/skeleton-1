<?php

/**
 * @Author: wonli <wonli@live.com>
 */
namespace app\admin\views;

class AclView extends AdminView
{
    /**
     * 权限控制系统默认页面
     *
     * @param $data
     */
    function index($data)
    {
        if (! empty($data['menu_list'])) {
            $this->renderTpl('acl/index', $data['menu_list']);
        } else {
            $this->notice(100026);
        }
    }

    /**
     * 编辑子菜单
     *
     * @param $data
     */
    function editMenu($data)
    {
        if (! empty($data['menu_list'])) {
            $this->renderTpl('acl/menu_manager', array($data['menu_list']));
        } else {
            $this->notice(100026);
        }
    }

    /**
     * 导航管理视图
     *
     * @param array $data
     */
    function navManager($data = array())
    {
        $this->renderTpl('acl/nav_manager', $data);
    }

    /**
     * 添加角色
     *
     * @param $data
     */
    function addRole($data)
    {
        if (!empty($data ['notes'])) {
            $this->notice($data['notes']);
        }

        $menu_list = $data ['menu_list'];
        include $this->tpl("acl/add_role");
    }

    /**
     * 编辑角色权限
     *
     * @param $data
     */
    function editRole($data)
    {
        $role_info = $data ['role_info'];
        $menu_list = $data ['menu_list'];
        $menu_select = explode(',', $data['role_info']['behavior']);

        include $this->tpl("acl/role_edit");
    }

    /**
     * 角色列表
     *
     * @param $data
     */
    function roleList($data)
    {
        if (!empty($data ['notes'])) {
            $this->notes($data['notes']);
        }
        include $this->tpl("acl/role_list");
    }

    /**
     * ACL用户列表
     *
     * @param $data
     */
    function user($data)
    {
        include $this->tpl("acl/user");
    }
}
