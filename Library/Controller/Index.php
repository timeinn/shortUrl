<?php
/**
 * KK-Framework
 * Author: kookxiang <r18@ikk.me>
 */

namespace Controller;

use Core\Error;
use Core\Template;
use Model\Url;

class Index
{
    /**
     * 根据 随机短字串 重定向到对应长网址
     * @DynamicRoute /{string}
     * @param $shortUrl
     * @throws Error
     */
    function shortReductionByChar($shortUrl)
    {
        $bean = Url::findUrl($shortUrl);
        if (!$bean) {
            throw new Error('The request URL is not exists', 404);
        } else {
            header('Location: ' . $bean->url);
        }
    }

    /**
     * 根据 ID 重定向到 ID 对应的长网址
     *
     * @DynamicRoute /{integer}
     * @param $id
     * @throws Error
     */
    function shortReduction($id) {
        $obj = Url::findUrlById($id);
        if (!$obj) {
            throw new Error('The request URL is not exists', 404);
        }
        header('Location: ' . $obj->url);
    }

    /**
     * @Home
     * @Route /Index
     */
    function index()
    {
        Template::setView('Index');
    }
}
