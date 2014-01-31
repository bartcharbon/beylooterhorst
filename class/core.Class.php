<?php
/**
* Scouting Beyloo Ter Horst, Beilen.
*
* PHP VERSION 5
*
* @category       	System (Class)
* @package        	Scouting Beyloo Ter Horst
* @author        	Dennis Gerding (dennis@edoras.nl)
* @copyright    	2005 - 2006 Edoras Media
* @link           	 http://beyloo.schauwfax.nl
* @version        	1.0
* @lastchagne    	25 - 04 - 2007
* @since        	24 - 11 - 2006 (Release 1.0.0)
* @file		class/core.class.php
*/

session_start();
ob_start();

class core {

	
	public static function SQLConnect() {
		 $ini_array = parse_ini_file('credentials.ini');
		 $sHost = 'localhost';
		 $sUser = $ini_array['db_user'];
		 $sPass = $ini_array['db_password'];
		 $sDb =   $ini_array['db_name'];
	
		@mysql_connect($sHost, $sUser, $sPass) or die('Foutmelding: Kan geen verbinding met de database maken!');
		mysql_select_db($sDb);
	}
	public static function SQLClose() {
		mysql_close();
	}
}
?>
