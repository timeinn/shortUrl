<?php
/**
 * Created by IntelliJ IDEA.
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 14:35
 */

namespace Controller;

use \Model\Short as ShortUrl;

class Short
{
    public function Index()
    {
        $result = array();
        $result['error'] = 1;
        if(!isset($_POST['url']) || $_POST['url'] != null) {
            $result['message'] = 'ÇëÇóÎª¿Õ';
        } else {
            $result['error'] = 0;
            $shortUrl = ShortUrl::CompressURL( htmlspecialchars($_POST['url']) );
            $result['shortUrl'] = $shortUrl;
        }
        echo json_encode($result);
        exit();
    }

}