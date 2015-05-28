<?php

function sec (&$array)
{
    if (is_array($array)) {
        foreach ($array as $k => $v) {
            $array[$k] = sec($v);
        }
    } else 
        if (is_string($array)) {
            $array = addslashes(trim($array));
        } else 
            if (is_numeric($array)) {
                $array = intval($array);
            }
    return $array;
}

/*
 * function showErr($message,$url){
 * if ($_GET) {
 * if (!array_key_exists('err',$_GET)) {
 * $info = '未知的错误';
 * require_once(ROOT_PATH.'views/error.html');
 * exit;
 * }
 * require_once(ROOT_PATH.'views/error.html');
 * exit;
 *
 * }
 * }
 */
function formatDate ($time)
{
    return date('F j Y  g:i A', $time);
}

function checkLogin ()
{
    if (empty($_SESSION)) {
        return false;
    } 
    else 
    {
        return true;
    }
}

function checkUserStatus ($username)
{
    $userinfo = Models_User::getUser($username);
    if (empty($userinfo)) {
        Lib_MsgError::setMsg('not found user', 'index.php');
    } else if ( $userinfo['status'] != 1 )
    {
        Lib_MsgError::setMsg('user is ban', 'index.php');
    }
    return $userinfo;
}

function checkPermission ($type = 'admin')
{
    if ( checkLogin() )
    {
        $userinfo = checkUserStatus($_SESSION['account']);
        if ( $userinfo['level'] != 3 && $type == 'admin' )
        {
            Lib_MsgError::setMsg('no Permission admin ', $url);
        }
        else if( $userinfo['level'] != 2 && $type == 'vip')
        {
            Lib_MsgError::setMsg('no Permission vip', $url);
        }
    }
    else 
    {
        Lib_MsgError::setMsg('no login', 'index.php');
    }
    return $userinfo;
}

function checkEmail ( $email )
{
    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    return preg_match( $pattern, $email );
}


/**
 * 自动加载方法
 *
 * @param unknown $model
 */
function autoload ($clazz)
{

	$clazzPath = explode('_', $clazz);

	if ( count($clazzPath) != 2 )
	{
		return ;
	}
	$filePath = ROOT_PATH . '/' . implode('/', $clazzPath) . '.php';

	if ( file_exists( $filePath ) )
	{
		require_once($filePath);
	}
}