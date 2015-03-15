<?php

error_reporting(E_ALL); // toutes les erreurs seront reportées, mais pas forcément affichées

define('DB_HOST','localhost');
define('DB_NAME','exercice-login-chalon_axel');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

define('MODE','prod'); // en dev affiche les erreurs, en prod non
define('SERVER','http://'.$_SERVER['SERVER_NAME'].substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'/'))); // par exemple http://127.0.0.1/monsite/

define('SALT','ù^£*ù!/;?;/!%*£^');

header('Content-Type: text/html; charset=utf-8'); // surtout utile pour l'affichage des erreurs dans le bon encodage avant l'HTML

if (MODE === 'prod') ini_set("display_errors", 0);
else ini_set("display_errors", 1);

// Supprime les magic quotes si elles existent
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

// Error handler
function error_handler($errno, $msg, $file, $line, $context = array())
{
	$die=false;
	switch ($errno)
	{
		case E_ERROR:
			$die=true;
			$errtype="E_ERROR";
			break;

		case E_WARNING:
			$errtype="E_WARNING";
			break;

		case E_NOTICE:
			$errtype="E_NOTICE";
			break;
		
		case E_USER_ERROR:
			$die=true;
			$errtype="E_USER_ERROR";
			break;

		case E_USER_WARNING:
			$errtype="E_USER_WARNING";
			break;

		case E_USER_NOTICE:
			$errtype="E_USER_NOTICE";
			break;

		default:
			$errtype="UNKNOWN";
			break;
	}
	$errtype.=' ('.$errno.')';

	$str=date('d/m/Y H:i:s').' --- IP : '.$_SERVER['REMOTE_ADDR']."\n";
	$str.=$errtype.' - '.$msg."\n";
	$str.='Ligne - '.$file.':'.$line."\n";
	$str.='Page - '.$_SERVER['REQUEST_URI']."\n";
	$str.="\n***\n\n";
	
	if (MODE === 'dev')
        echo nl2br($str);
    else
    {
       $fp=fopen('../private_html/errors.txt','a');
	   fwrite($fp,$str);
	   fclose($fp);
    }
    
	if ($die) exit();
	return true; // Ne pas éxecuter le gestionnaire interne PHP
}
set_error_handler('error_handler');

// -- PDO -- 

try
{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // pour éviter des bugs à l'insertion des valeurs nulles
}
catch (Exception $e)
{
    echo 'Une erreur de connexion à la base de données a été rencontrée.';
    trigger_error("Erreur PDO : " . $e->getMessage(), E_USER_ERROR);
}