<?php
/**
 * Created by IntelliJ IDEA.
 * Author: Sendya <18x@Loacg.com>
 * Time: 2015/10/24 18:49
 */

namespace Core;


class Router extends DefaultRouter
{
    public function handleRequest()
    {
        $requestPath = Request::getRequestPath();
        $requestPath = ltrim($requestPath, '/');

        if (!$requestPath) {
            $requestPath = 'Index';
        }

        $this->findController($requestPath);

        if (!$this->foundController) {
            $this->findController('Short/Redirect');
        }
    }
}