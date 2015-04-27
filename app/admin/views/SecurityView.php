<?php

/**
 * @Author: wonli <wonli@live.com>
 */
namespace app\admin\views;

class SecurityView extends AdminView
{
    /**
     * 输出密保卡
     *
     * @param array $data
     */
    function printSecurityCard($data=array())
    {
        if ($data['status'] == 1) {
            self::_print($data['card']);
        }
    }

    /**
     * 输出status
     *
     * @param array $data
     */
    function printStatus($data = array())
    {

    }

    /**
     * 下载密保卡
     *
     * @param $notes
     */
    function makeSecurityImage($notes)
    {
        if (isset($notes['ok']) && $notes['ok'] < 0) {
            echo $notes["msg"];
        } else {
            echo '正在下载...';
        }
    }

    /**
     * 打印密保卡
     *
     * @param $code_data
     */
    function _print($code_data)
    {
        ?>
        <table
            style="width:450px;height:450px;text-align:center;border:1px solid #151428;margin:20px;border-collapse: collapse;">
            <tr>
                <td></td>
                <?php for ($i = 1; $i <= 9; $i++) : ?>
                    <td style="background:#151428;color:#ffffff;width:40px;border:1px solid #808080"><?php echo $i ?></td>
                <?php endfor ?>
            </tr>
            <?php foreach ($code_data as $k => $v) : ?>
                <tr>
                    <td style="background:#151428;color:#ffffff;width:40px;border:1px solid #808080"><?php echo $k ?></td>
                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                        <td style="border:1px solid #808080"><?php echo $v[$i] ?></td>
                    <?php endfor ?>
                </tr>
            <?php endforeach ?>
        </table>
    <?php
    }

    /**
     * 修改密码
     *
     * @param $data
     */
    function changePassword($data)
    {
        $this->renderTpl('security/change_password', $data);
    }
}
