<?php
require 'Inc/init.class.php';
if ( empty($_GET['method']) )
{
    return 'fake';
}

$path = '';

switch ($_GET['method'])
{
    //reg
    case 'reg':
        if ( !empty($_GET['email']) && !empty($_GET['password']) )
        {
            $user = Models_User::getUser($_GET['email']);
            if ( !empty($user) )
            {
                Lib_MsgError::setMsg('user isexits', 'user.php?method=reg');
            }
            if ( !checkEmail($_GET['email']) )
            {
                Lib_MsgError::setMsg('not a email address', 'user.php?method=reg');
            }
            
            foreach (array('email','password','address','homephone','mobilephone','first','last') as $k=>$v)
            {
                if ( empty($_GET[$v]))
                {
                    Lib_MsgError::setMsg($v.' is empty');
                }
            }
            
            Models_User::reg($_GET['email'], $_GET['password'], '', $_GET['homephone'],$_GET['mobilephone'],$_GET['first'],$_GET['last'],$_GET['address']);
            Lib_MsgError::setMsg('user reg ok');
           
        }
        $path = 'user_reg.php';
        break;
    //login
    case 'login':
        if ( checkLogin() )
        {
            Lib_MsgError::setMsg('user is login', 'center.php');
        } 
        else if ( !empty($_GET) && !empty($_GET['username']) && !empty($_GET['password']) )
        {
            $username = $_GET['username'];
            $userinfo = Models_User::getUser($username);
            
            checkUserStatus($username);
            
            $passwd = md5($_GET['password']);
            if ( $userinfo['password'] == $passwd )
            {
                Models_User::userLogin($username,$userinfo['id'],$userinfo['homephone'],$userinfo['mobilephone'],$userinfo['address'],$userinfo['level']);
                Lib_MsgError::setMsg('user login success', 'center.php');
            }
            else 
            {
                Lib_MsgError::setMsg('input password is wrong');
            }
        }
        else 
        {
            Lib_MsgError::setMsg('username or password is empty');
        }
        $path = 'index.php';
        break;
    case 'logout':
        Models_User::userLogout();
        Lib_MsgError::setMsg('logout success');
        break;
    case 'center':
 
        break;
    case 'profile':

        break;
    case 'list':
        $userAll = Models_User::getUserAll();
        $path = 'user_list.php';
        break;
    default:
        Lib_MsgError::setMsg('err');
        break;
}
require_once (VIEWS_PATH . '/front/' . $path);
require_once VIEWS_PATH . '/front/footer.php';