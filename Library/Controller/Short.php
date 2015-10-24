<?php
/**
 * Created by IntelliJ IDEA.
 * Author: Sendya <18x@loacg.com>
 * Time: 2015/10/22 14:35
 */

namespace Controller;

use \Core\Error;
use \Core\Request;
use \Model\Short as ShortUrl;

class Short
{
    public function Index()
    {
        $result = array();
        $result['error'] = 1;
        if(!isset($_REQUEST['url']) || $_REQUEST['url'] == null) {
            $result['message'] = '地址为空';
        } else {
            $result['error'] = 0;
            $bean = new ShortUrl();
            $url = htmlspecialchars($_REQUEST['url']);
            $bean->url = $url;
            $id = $bean->CompressURL();
            if($id == 0)
            {
                $result['message'] = '该地址已存在';
                $bean = ShortUrl::CheckUrl($url);
            }
            $result['alias'] = $bean->alias;
            $result['url'] = $bean->url;
        }
        echo json_encode($result);
        exit();
    }

    public function Redirect()
    {
        $requestPath = Request::getRequestPath();
        $requestPath = ltrim($requestPath, '/');

        $bean = ShortUrl::GetUrlByAlias($requestPath);
        if(!$bean)
        {
            throw new Error('The request URL is not exists', 404);
        } else {
            header('Location: '.$bean->url);
        }
    }

}