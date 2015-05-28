<?php
require 'Inc/init.class.php';
if ( !checkLogin() )
{
    Lib_MsgError::setMsg('no login');
}

//check this user exists
$userinfo = checkUserStatus($_SESSION['username']);

if ( $userinfo['status'] == 1 )
{
    switch ($userinfo['level'])
    {
        //user
        case 1:
            //
        case 2:
            //admin
        case 3:
            $path = 'center.php';
            break;
        default:
            Lib_MsgError::setMsg('not user level');
            break;
    }
}
include VIEWS_PATH . '/front/' . $path;

require_once VIEWS_PATH . '/front/footer.php';