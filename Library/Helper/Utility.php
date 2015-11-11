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
        for ($i =0; $i < $length ; $i++) {
            $key .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $key;
    }

    public static function GetConfig($cname) {
        $file = DATA_PATH . "Config.php";
        if(!file_exists($file)) return false;
        
        $config = preg_match("/define\('" .preg_quote($cname). "', '(.*)'\);/", $str, $res);
        return $res[1];
    }
    
    public static function SetConfig($cname, $value) {
        $file = DATA_PATH . "Config.php";
        if(!file_exists($file)) return false;
        $str = file_get_contents($file);
        
        $str2 = preg_replace("/define\('" .preg_quote($cname). "', '(.*)'\);/", "define('" .preg_quote($cname). "', '".$value."');", $str);
        
        file_put_contents($file, $str2);
    }

    public static function GetDb() {

    }

    public static function SetDb($dbName, $host, $user, $password) {
        $file = DATA_PATH . "Config.php";
        if(!file_exists($file) && !Utility::GetConfigFile()) return false;
        $str = file_get_contents($file);
        $str2 = preg_replace("/Database::register\((.*)\);/", "Database::register('mysql:dbname=".preg_quote($dbName).";host=".preg_quote($host).";charset=UTF8', '".preg_quote($user)."', '".preg_quote($password)."');", $str);

        file_put_contents($file, $str2);
    }

    public static function GetConfigFile() {
        $file = DATA_PATH . "Config.php";
        if(!file_exists($file)) {
            if(copy(DATA_PATH . "Config.sample.php", DATA_PATH . "Config.php")) {
                return true;
            } else {
                return false;
            }
        }
        return true;
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