<?php

date_default_timezone_set('asia/shanghai');

error_reporting(E_ALL | E_PARSE | E_CORE_ERROR | E_CORE_WARNING);

session_start();

define('ROOT_PATH', dirname(dirname(str_replace('\\', '/', __FILE__))) . '/');

define('INC_PATH',  ROOT_PATH . '/Inc/');
define('CONTROIS_PATH', ROOT_PATH . '/controls/');
define('LIB_PATH',  ROOT_PATH . '/Lib/');
define('LOG_PATH',      ROOT_PATH . '/Log/');
define('MODELS_PATH',   ROOT_PATH . '/Models/');
define('VIEWS_PATH',  ROOT_PATH.  '/views/');
define('STYLE_PATH',     'views/style/');
define('CSS_PATH', STYLE_PATH . '/css/');
define('JS_PATH',  STYLE_PATH . '/js/');
define('IMAGES_PATH', STYLE_PATH . '/images/');
define('UPLOAD_PATH', ROOT_PATH . '/views/style/images/upload/');

require_once ( LIB_PATH . '/util.php' );

spl_autoload_register('autoload');

require_once VIEWS_PATH . '/front/header.php';

$log = Lib_Log::getIns();

if (@get_magic_quotes_gpc ()) {
    $_GET = sec ( $_GET );
    $_POST = sec ( $_POST );
    $_COOKIE = sec ( $_COOKIE );
    $_FILES = sec ( $_FILES );
}

$_SERVER = sec ( $_SERVER );

$uri = $_SERVER ['REQUEST_URI'];
$arrUri = explode ( '?', $uri, 2 );

$uri = $arrUri [0];
while ( true )
{
    $nuri = str_replace ( '//', '/', $uri );
    if ($nuri == $uri)
    {
        break;
    }
    $uri = $nuri;
}

$length = strlen ( $uri );

if ($uri [$length - 1] == '/')
{
    $uri = substr ( $uri, 0, $length - 1 );
}

$paths = explode('/', $uri);

$action = array_pop($paths);
if ( empty( $action )) 
{
    $action = 'index.php';
}
