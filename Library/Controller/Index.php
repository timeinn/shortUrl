<?php
/**
 * KK-Framework
 * Author: kookxiang <r18@ikk.me>
 */

namespace Controller;

use Core\Template;
use Model\Url;

class Index
{
    /**
     * @DynamicRoute /{string}
     * @param $shortUrl
     * @throws Error
     */
    function dynamicRouteTest($shortUrl)
    {
        $bean = Url::findUrl($shortUrl);
        if (!$bean) {
            throw new Error('The request URL is not exists', 404);
        } else {
            header('Location: ' . $bean->url);
        }
    }

    /**
     * @Home
     * @Route /Index
     */
    function index()
    {

        Template::setView('Index');
    }

    /**
     * This method can be call by /index/test.json
     * @Route /Test
     * @JSON
     */
    function test()
    {
        return array(
            'hello' => 1,
            'world' => 2
        );
    }
}
