<?php
require 'Inc/init.class.php';
$method = '';

if ( !empty($_REQUEST['method'] ) )
{
    $method = $_REQUEST['method'];
    unset($_REQUEST['method']);
}

switch ($method)
{
    case 'list':
        $where = '';
        if ($_SESSION['level'] != 3 )
        {
            $where = 'uid='.$_SESSION['id'];
        }        
        $list = Models_Events::eventsList($where);
        
        $path = 'events_list.php';
        break;
    case 'add':
        unset($_REQUEST['add']);
        
        if (!empty($_REQUEST))
        {            
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img'] )) {
                $target_file = UPLOAD_PATH;
                                $file = 'events'.date('YmdHi');
                switch ($_FILES['img']['type'])
                {
                    case 'image/jpeg':
                        $file .='.jpg';
                        break;
                    case 'image/png':
                        $file .='.png';
                        break;
                }
                move_uploaded_file($_FILES["img"]['tmp_name'], $target_file.$file);
                $_REQUEST['img'] = 'views/style/images/upload/'.$file;
            }
            foreach (array('title','long_time','img','link') as $v)
            {
                if ( empty($_REQUEST[$v]) )
                {
                    Lib_MsgError::setMsg($v.' not empty');
                }
            }
            unset($_REQUEST['add']);
            $_REQUEST['uid'] = $_SESSION['id'];
            $_REQUEST['uname'] = $_SESSION['username'];
            $_REQUEST['create_time'] = time();
            $_REQUEST['status'] = 1;
            $_REQUEST['long_time'] = time() + (86400 * intval($_REQUEST['long_time']));
            Models_Events::addEvents($_REQUEST);
            Lib_MsgError::setMsg('add ok', 'center.php');
        }
        
        $path = 'events_add.php';
        break;
    case 'info':
        $id = $_REQUEST['id'];
	    unset($_REQUEST['id']);
	    
	    $info = Models_Events::getEvents($id);

	    $path = 'events_edit.php';

        break;
    case 'edit':
        $id = $_REQUEST['id'];
        unset($_REQUEST['id']);
         
        if ( !empty($_REQUEST) )
        {            
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img']['name'] )) {
                $target_file = UPLOAD_PATH;
                                $file = 'events'.date('YmdHi');
                switch ($_FILES['img']['type'])
                {
                    case 'image/jpeg':
                        $file .='.jpg';
                        break;
                    case 'image/png':
                        $file .='.png';
                        break;
                }
                move_uploaded_file($_FILES["img"]['tmp_name'], $target_file.$file);
                $_REQUEST['img'] = 'views/style/images/upload/'.$file;
            }
            $_REQUEST['long_time'] = time() + (86400 * intval($_REQUEST['long_time']));
            Models_Events::doEvents($id, $_REQUEST);
            Lib_MsgError::setMsg('mod ok', 'center.php');
        }
        break;
    default:
        $list = Models_Events::eventsList();
        
        $path = 'events.php';
    break;
}

include VIEWS_PATH . '/front/'.$path;

require_once VIEWS_PATH . '/front/footer.php';