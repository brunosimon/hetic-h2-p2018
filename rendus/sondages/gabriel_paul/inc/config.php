<?php
/*================================
=     DATABASE CONFIGURATION     =
================================*/


    // PARAMETERS FOR LOCAL TESTING, SERVER IS CONFIGURED TO AUTOMATICALLY DISPLAY ERRORS
    // ini_set('display_errors',1);
    // ini_set('display_startup_errors',1);
    // error_reporting(-1);

	define("DB_HOST", "localhost");
    define("DB_NAME", "exercice-sondage-gabriel_paul");
	define("DB_USER", "root");
	define("DB_PSSWD", "root");

/*-----  End of DATABASE CONFIGURATION ------*/

/*================================
=        PDO CONNECTION          =
================================*/
try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PSSWD);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
   	die('Could not connect');

}

