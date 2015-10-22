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
}