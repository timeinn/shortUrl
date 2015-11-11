<?php
/**
 * Created by IntelliJ IDEA.
 * Athor: Sendya <18x@loacg.com>
 * Time: 2015/10/22 2:24
 */

namespace Controller;

use Helper\Utility;
use Core\Template;
use Core\Error;

class Key
{
	/**
	 *	Install 
	 */
    public function Index()
    {
    	include Template::load("Install/Install");
        //throw new Error("Please go to /CreateKey");
    }

    public function Set()
    {
    	$dbname = $_POST['dbname'];
    	$host = $_POST['host'];
    	$user = $_POST['user'];
    	$passwd = $_POST['password'];
    	Utility::SetDb($dbname, $host, $user, $passwd);

    	Utility::SetConfig('ENCRYPT_KEY', Utility::getHashKey(10));
    	Utility::SetConfig('COOKIE_KEY', Utility::getHashKey(10));
    }

}