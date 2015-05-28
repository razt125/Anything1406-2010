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
 
        $list = Models_List::listAll();
        $path = 'list_list.php';
        break;
    case 'add':

        if (!empty($_REQUEST))
        {            
         
            foreach (array('title') as $v)
            {
                if ( empty($_REQUEST[$v]) )
                {
                    Lib_MsgError::setMsg($v.' not empty');
                }
            }
            $_REQUEST['create_time'] = time();
            Models_List::addList($_REQUEST);
            Lib_MsgError::setMsg('add ok', 'center.php');
        }
        
        $path = 'list_add.php';
    break;
    case 'info':
        $id = $_REQUEST['id'];
        $info = Models_List::getList($_REQUEST['id']);
        $path = 'list_info.php';
        break;
    case 'edit':
        $id = $_REQUEST['id'];
        unset($_REQUEST['id']);
        $info = Models_Musicians::getMusicians($id);
        if ( !empty($_REQUEST) )
        {            
            Models_List::doList($id, $_REQUEST);
            Lib_MsgError::setMsg('mod ok', 'center.php');
        
        }
        $path = 'list_edit.php';
        break;
    default:
        $list = Models_List::listAll();
        $path ='list.php';
        break;
}

include VIEWS_PATH . '/front/'.$path;
require_once VIEWS_PATH . '/front/footer.php';