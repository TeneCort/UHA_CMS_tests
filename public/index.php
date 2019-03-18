<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'app' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODEL', ROOT . 'app' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR);
define('DATA', ROOT . 'app' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define('CONTROLLER', ROOT . 'app' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);

/*highlight_string("<?php\n\$data =\n" . var_export(ROOT, true) . ";\n?>");*/

$modules = [ROOT,APP,CORE,CONTROLLER,DATA];

/*highlight_string("<?php\n\$data =\n" . var_export($modules, true) . ";\n?>");*/

set_include_path(ROOT . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));

spl_autoload_register('spl_autoload', false);

new Application;

?>
