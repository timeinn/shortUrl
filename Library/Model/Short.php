<?php
/**
 * Created by IntelliJ IDEA.
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 14:39
 */

namespace Model;


class Short
{
    public $id;
    public $shortUrl;//短址
    public $url;//原址
    public $status;//状态, 0-自动压缩,1-手动压缩
    public $time;//生成时间

    public static function CompressURL($url, $length)
    {

    }

    public static function GetUrlById($id)
    {
        $statement = Database::prepare("SELECT id,shortUrl,url,status,time FROM list WHERE id=?");
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Model\\Short');
        return $statement->fetch(\PDO::FETCH_CLASS);
    }

}