<?php
/**
 * Short URL
 * Author: Sendya <18x@loacg.com>
 * Time: 2015/10/22 14:35
 */

namespace Controller;

use Helper\Utility;
use Model\Url;

class Short
{

    /**
     * @JSON
     * @Route /short/alias
     */
    public function alias()
    {
        $result = array();
        $result['error'] = 1;
        if (!isset($_REQUEST['url']) || $_REQUEST['url'] == null) {
            $result['message'] = '地址为空';
            return $result;
        }

        if (stristr($_REQUEST['url'], BASE_URL) !== false) {
            $result['message'] = '你想干吗? Tips:不能压缩本站地址或已经被压缩的地址';
            return $result;
        }

        $url = htmlspecialchars($_REQUEST['url']);
        $tUrl = Url::findUrl($url);
        if ($tUrl != null) {
            $result['message'] = '该地址已存在';
            $result['alias'] = $tUrl->alias;
            return $result;
        }

        $bean = new Url();
        $bean->url = $url;
        $bean->alias = Utility::url2Short2($url);
        $bean->status = 1;
        $bean->add_time = time();
        $bean->click_num = 1;
        $bean->save();
        
        $result['error'] = 0;
        $result['alias'] = $bean->alias;
        $result['url'] = $bean->url;
        return $result;
    }

    public function redirect()
    {
        $requestPath = Request::getRequestPath();
        $requestPath = ltrim($requestPath, '/');
        $bean = Url::findUrl($requestPath);
        if (!$bean) {
            throw new Error('The request URL is not exists', 404);
        } else {
            header('Location: ' . $bean->url);
        }
    }
}