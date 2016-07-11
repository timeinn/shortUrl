<?php
/**
 * ShortUrl
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 2:15
 * Modifyed: 2015/11/11 09:51
 */

namespace Helper;


class Utility
{
    public static function getHashKey($length)
    {

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $key;
    }

    public static function url2Short($alias)
    {

        if (!isset($alias) || $alias == '') {
            $alias = base64_encode(md5(time() + mt_rand(1000, 99999)));
            $alias = substr($alias, 0, 5);
        } else {
            if ($alias && (strlen($alias) <= SHORT_LENGTH || !preg_match("/^([a-zA-Z0-9]+)$/", $alias))) {
                $ret['message'] = '短链接长度不得少于 ' . SHORT_LENGTH . ' 个字符';
            }
    }
        return $alias;
    }

    public static function url2Short2($url)
    {
        $hash = base64_encode(md5($url . microtime()));
        $token = substr($hash, -9);
        $token = substr($token, 0, 6);
        return $token;
    }
}