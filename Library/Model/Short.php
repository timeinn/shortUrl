<?php
/**
 * Created by IntelliJ IDEA.
 * Author: Sendya <18x@loacg.com>
 * Time: 2015/10/22 14:39
 */

namespace Model;

use \Core\Database;
use \Helper\Utility as Utils;

class Short
{
    public $id;
    public $alias;
    public $url;
    public $status;
    public $time;

    public function CompressURL()
    {
        //$alias = Utils::UrlToShort($alias);
        if($this->alias == null || $this->alias == '' || !isset($this->alias))
        {
            $this->alias = Utils::UrlToShort2($this->url);
        }
        $this->time = time();

        $inTransaction = Database::inTransaction();
        if (!$inTransaction) {
            Database::beginTransaction();
        }
        $statement = Database::prepare("INSERT INTO url_list SET url=:url, alias=:alias, posttime=:posttime");
        $statement->bindValue(':url', $this->url, \PDO::PARAM_STR);
        $statement->bindValue(':alias', $this->alias, \PDO::PARAM_STR);
        $statement->bindValue(':posttime', $this->time, \PDO::PARAM_STR);
        $statement->execute();
        $this->id = Database::lastInsertId();
        if (!$inTransaction) {
            Database::commit();
        }
        return $this->id;
    }

    public static function GetUrlById($id)
    {
        $statement = Database::prepare("SELECT id,alias,url FROM url_list WHERE id=?");
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Model\\Short');
        return $statement->fetch(\PDO::FETCH_CLASS);
    }

    public static function GetUrlByAlias($alias)
    {
        $statement = Database::prepare("SELECT id,alias,url FROM url_list WHERE alias=?");
        $statement->bindValue(1, $alias, \PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Model\\Short');
        return $statement->fetch(\PDO::FETCH_CLASS);
    }

    public static function CheckUrl($url)
    {
        $statement = Database::prepare("SELECT id,alias,url FROM url_list WHERE url=?");
        $statement->bindValue(1, $url, \PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Model\\Short');
        return $statement->fetch(\PDO::FETCH_CLASS);
    }
}