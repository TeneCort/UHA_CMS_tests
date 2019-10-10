<?php
define('ROOT'      , dirname(__DIR__)   . DIRECTORY_SEPARATOR);
define('APP'       , ROOT . 'app'       . DIRECTORY_SEPARATOR);
define('VIEW'      , ROOT . 'app'       . DIRECTORY_SEPARATOR . 'view'       . DIRECTORY_SEPARATOR);
define('MODEL'     , ROOT . 'app'       . DIRECTORY_SEPARATOR . 'model'      . DIRECTORY_SEPARATOR);
define('DATA'      , ROOT . 'app'       . DIRECTORY_SEPARATOR . 'data'       . DIRECTORY_SEPARATOR);
define('CORE'      , ROOT . 'app'       . DIRECTORY_SEPARATOR . 'core'       . DIRECTORY_SEPARATOR);
define('CONTROLLER', ROOT . 'app'       . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);
define('OBJECTS'   , ROOT . 'app'       . DIRECTORY_SEPARATOR . 'objects'    . DIRECTORY_SEPARATOR);

$modules = [ROOT,APP,CORE,CONTROLLER,DATA,OBJECTS,MODEL];

require MODEL . "model.php";

foreach ($modules as $value) {
	foreach (glob($value . "*.php") as $filename) {	
		if (!fnmatch("*model*", $filename)) {
			require $filename;
		}
	}
}
?>