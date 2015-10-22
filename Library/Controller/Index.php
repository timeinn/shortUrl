<?php
/**
 * Created by IntelliJ IDEA.
 * Author: Sendya <18x@loacg.com>
 * Date: 2015/10/22 2:04
 */

namespace Controller;

use Core\Template;
use Core\Error;


class Index
{
    public function Index()
    {

        if(ENCRYPT_KEY == '' || COOKIE_KEY == '')
        {
            throw new Error("程序没有配置HashKey,请访问 <b>/Key/CreateKey</b> 生成新的Key", 505);
            exit();
        }

        include Template::load("Index");
    }


}