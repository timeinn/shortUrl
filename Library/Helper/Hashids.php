<?php
/**
 * Hashids
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 2:15
 * Modifyed: 2015/11/11 09:51
 */

namespace Helper;



class Hashids
{
    public static function initHashids()
    {
        return new \Hashids\Hashids(HASHIDS_SALT, SHORT_LENGTH);
    }

    public static function encode($id)
    {
        $hashids = self::initHashids();
        return $hashids->encode($id);
    }

    public static function decode($token)
    {
        $hashids = self::initHashids();
        return $hashids->decode($token);
    }
}
