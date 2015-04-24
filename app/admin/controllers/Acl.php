<?php
/**
 * @Author: wonli <wonli@live.com>
 * 实现了一个简单的权限控制系统
 */
namespace app\admin\controllers;

use modules\admin\AclModule;

class Acl extends Admin
{
    /**
     * 权限控制module
     *
     * @var \modules\admin\AclModule
     */
    protected $ACL;

    function __construct()
    {
        parent::__construct();
        $this->ACL = new AclModule;
    }

    function index()
    {
        $this->to("acl:navManager");
    }

    /**
     * 子菜单管理
     */
    function editMenu()
    {
        $m_name = $this->params['m'];
        if ($this->is_post()) {
            $this->ACL->saveMenu($_POST['menu']);
            $this->to($m_name);
        } else {
            $child_menu = array();
            $menu_list = $this->ACL->initMenuList();

            foreach($menu_list as $data) {
                if ($data['link'] == $m_name) {
                    $child_menu = $data;
                    break;
                }
            }
            $this->data['menu_list'] = $child_menu;
        }

        $this->display($this->data);
    }

    /**
     * 导航菜单管理
     */
    function navManager()
    {
        if ($this->is_post()) {
            if (isset($_POST['add'])) {
                $pid = isset($_POST['pid']) ? $_POST['pid'] : 0;
                $this->ACL->addNav($_POST['name'], $_POST['link'], $pid);
            }

            if (isset($_POST['save'])) {
                $this->ACL->saveNav($_POST['nav']);
            }

            $this->to('acl:navManager');
        }

        $this->data['menu'] = $this->ACL->getNavList();
        $this->display($this->data);
    }

    /**
     * 删除
     */
    function del()
    {
        if (!empty($this->params['id'])) {
            $this->ACL->delNav(intval($this->params['id']));
        }

        $this->to('acl:navManager');
    }

    /**
     * 添加管理角色
     */
    function addRole()
    {
        $menu_list = $this->ACL->initMenuList();

        if ($this->is_post()) {
            if (!empty($_POST['name']) && !empty($_POST['menu_id'])) {
                $menu_set = $_POST ['menu_id'];
                $ret = $this->ACL->saveRoleMenu($_POST['name'], $menu_set);

                if ($ret['status'] == 1) {
                    $this->to("acl:addRole");
                } else {
                    $data ['status'] = $ret['status'];
                }
            } else {
                $this->data ['status'] = 100022;
            }
        }

        $this->data ['menu_list'] = $menu_list;
        $this->display($this->data);
    }

    /**
     * 角色列表
     */
    function roleList()
    {
        $this->data ['role_list'] = $this->ACL->getRoleList();
        if ($this->is_post()) {
            $ret = $this->ACL->editRoleMenu($_POST['rid'], $_POST['name'], $_POST['menu_id']);
            if ($ret['status'] == 1) {
                $this->to("acl:roleList");
            }
        }

        $this->display($this->data);
    }

    /**
     * 编辑角色
     *
     * @return array|string
     */
    function editRole()
    {
        if (empty($this->params ['rid'])) {
            $this->to('acl');
        }

        $rid = (int) $this->params['rid'];
        $role_info = $this->ACL->getRoleInfo(array('id' => $rid));

        $this->data ['role_info'] = $role_info;
        $this->data ['menu_list'] = $this->ACL->initMenuList();

        if ($this->is_ajax_request()) {
            $this->view->editRole($this->data);
        } else {
            $this->display($this->data);
        }
    }

    /**
     * 管理员列表
     */
    function user()
    {
        $u = $this->ADMIN->getUserList();
        foreach ($u as $k => $ui) {
            if ($ui['rid'] == 0) {
                unset($u[$k]);
            }
        }

        $this->data ['u'] = $u;
        $this->data ['roles'] = $this->ACL->getRoleList();
        if ($this->is_post()) {
            $a = $_POST['a'];
            foreach ($a as $k => $v) {
                if ($k == '+') {
                    if (!empty($v ['name']) && !empty($v ['password'])) {
                        $this->ADMIN->addAdmin($v);
                    }
                } else {
                    if (!empty($v['name'])) {
                        $this->ADMIN->update($v, array('id' => $k));
                    } else {
                        $this->ADMIN->del(array('id' => $k));
                    }
                }
            }

            $this->to("acl:user");
        }

        $this->display($this->data);
    }
}



