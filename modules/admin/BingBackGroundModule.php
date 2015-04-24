<?php
/**
 * @Auth: wonli <wonli@live.com>
 * BingBackGroundModule.php
 * 获取cn.bing.com每日背景图片,并缓存在文件中
 */
namespace modules\admin;

use Cross\MVC\Module;
use Cross\Core\Loader;
use Cross\Core\Helper;

class BingBackGroundModule extends Module
{

    /**
     * bing的地址
     *
     * @var string
     */
    private $bing_url = 'http://cn.bing.com/';

    /**
     * 获取bing背景图片
     *
     * @return string
     */
    function getBingBackGroundImages()
    {

        $bg_cache_file = Loader::getFilePath("::cache/bg.cache.php");
        if (!file_exists($bg_cache_file)) {
            Helper::mkfile($bg_cache_file);
        }

        //读取文件内容
        $cache_content = Loader::read($bg_cache_file);
        if (!is_array($cache_content)) {
            $cache_content = array();
        } else {
            if (isset($cache_content[date("z")])) {
                return $cache_content[date("z")];
            }
        }

        //获取bing首页背景图片
        $imageName = $this->saveBingBackGroundImages();
        $cache_content[date("z")] = $imageName;

        //更新缓存文件内容
        file_put_contents($bg_cache_file, "<?php return " . var_export($cache_content, true) . ";");
        return $imageName;
    }

    /**
     * 保存bing背景图片
     *
     * @return string
     */
    private function saveBingBackGroundImages()
    {
        $parent_path = date("Y");
        $save_path = Loader::getFilePath("::htdocs/admin/static/images/bg/{$parent_path}/");
        if (!is_dir($save_path)) {
            mkdir($save_path, 0777, true);
        }

        $bing = file_get_contents($this->bing_url);
        /**
         * url:'/fd/hpk2/OaklandBayBridge_ZH-CN614487829.jpg'
         */
        $pattern = '/url:\'(.*)\'/U';
        $matches = array();
        preg_match($pattern, $bing, $matches);

        $arrPathInfo = pathinfo($matches[1]);
        $imageName = date("z") . "_{$arrPathInfo['basename']}";

        $file_name = $save_path . $imageName;
        if (!file_exists($file_name)) {
            file_put_contents($file_name, file_get_contents($matches[1]));
        }

        return "{$parent_path}/{$imageName}";
    }

}
