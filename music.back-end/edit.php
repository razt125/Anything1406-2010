<?php 
require 'Inc/init.class.php';

if ( !checkLogin() )
{
    Lib_MsgError::setMsg('no login');
}

if ( empty($_GET['method']) )
{
    Lib_MsgError::setMsg('not have method');
}

$userinfo = Models_User::getUser($_SESSION['username']);

$method = $_GET['method'];
unset($_GET['method']);
switch ($method)
{
	case 'profile':
	    if ( !empty($_GET) )
	    {
    	    $id = $_GET['id'];
    	    unset($_GET['id']);
    	    $data = array();
    	    foreach ($_GET as $k=>$v)
    	    {
    	        if ( ($v != '' && $v == 0) || !empty($v) )
        	        { 
    	            if ( $k == 'password' )
    	            {
    	                $v = md5($v);
    	            }
    	            $data[$k] = $v;
    	        }
    	    }
	        Models_User::doUserInfo($id, $data);
	        Lib_MsgError::setMsg('mod ok', 'center.php');
	    }
	    $path = 'user_info.php';
	    break;
	case 'user':
	    $userinfo = Models_User::getUser($_GET['account']);
	    unset($_GET['account']);
	    
	    if (!empty($_GET))
	    {    
	        $data = array();
    	    foreach ($_GET as $k=>$v)
    	    {
    	        if ( ($v != '' && $v == 0) || !empty($v) )
    	        {
    	            if ( $k == 'password' )
    	            {
    	                $v = md5($v);
    	            }
    	            $data[$k] = $v;
    	        }
    	    }
  	        Models_User::doUserInfo($userinfo['id'], $data);
	      
	        Lib_MsgError::setMsg('mod ok', 'center.php');
	      
	    }
	    $path = 'user_edit.php';
	    break;
    default:
        Lib_MsgError::setMsg('err');
        break;
}
if ( file_exists(VIEWS_PATH.'/front/'.$path))
{
    require_once (VIEWS_PATH . '/front/' . $path);
}
require_once VIEWS_PATH . '/front/footer.php';