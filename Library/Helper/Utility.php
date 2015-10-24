<?php
/**
 * Created by IntelliJ IDEA.
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 2:15
 */

namespace Helper;


class Utility
{
    public static function getHashKey($length)
    {

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
        $key = '';
        for ($i =0; $i < $length ; $i++) {
            $key .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $key;
    }

    public static function UrlToShort($alias)
    {

        if(!isset($alias) || $alias == '')
        {
            $alias = base64_encode(md5(time() + mt_rand(1000,99999)));
            $alias = substr($alias,0,5);
        }
        else
        {
            if($alias && (strlen($alias)<=SHORT_LENGTH || !preg_match("/^([a-zA-Z0-9]+)$/",$alias)))
            {
                $ret['message'] = '自定义短网址必须是由字母和数字组成的大于'.SHORT_LENGTH.'位长度的字符串';
            }
        }
        // 结果
        return $alias;
    }

    public static function UrlToShort2($url)
    {
        $hash = base64_encode(md5($url . microtime()));
        $token = substr($hash, -9);
        $token = substr($token,0,6);
        return $token;
    }
}