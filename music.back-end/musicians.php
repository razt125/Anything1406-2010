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
        $list = Models_Musicians::musiciansList($where);
        $path = 'musicians_list.php';
        break;
    case 'add':

        if (!empty($_REQUEST))
        {            
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img'] )) {
                $target_file = UPLOAD_PATH;
                                $file = 'musicians'.date('YmdHis');
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
            foreach (array('title','content','facebook','email','img') as $v)
            {
                if ( empty($_REQUEST[$v]) )
                {
                    Lib_MsgError::setMsg($v.' not empty');
                }
            }
            $_REQUEST['uid'] = $_SESSION['id'];
            $_REQUEST['uname'] = $_SESSION['username'];
            $_REQUEST['create_time'] = time();
            $_REQUEST['status'] = 1;
            Models_Musicians::addMusicians($_REQUEST);
            Lib_MsgError::setMsg('add ok', 'center.php');
        }
        $list = Models_List::listAll();
        $path = 'musicians_add.php';
    break;
    case 'info':
  
        $info = Models_Musicians::getMusicians($_REQUEST['id']);
        $list = Models_List::listAll();
        $path = 'musicians_info.php';
        break;
    case 'edit':
        $id = $_REQUEST['id'];
        unset($_REQUEST['id']);
        $list = Models_List::listAll();
        
        $info = Models_Musicians::getMusicians($id);
        if ( !empty($_REQUEST) )
        {            
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img']['name'] )) {
                $target_file = UPLOAD_PATH;
                                $file = 'musicians'.date('YmdHis');                
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
            Models_Musicians::doMusicians($id, $_REQUEST);
            Lib_MsgError::setMsg('mod ok', 'center.php');
        
        }
        $path = 'musicians_edit.php';
        break;
    default:
        $where = '';
        $type = 'all';
        if ( !empty($_REQUEST['type']) && $_REQUEST['type'] != 'all')
        {
            $where = ' type = "'.$_REQUEST['type'].'"';
            $type = $_REQUEST['type'];
        }
        $list = Models_Musicians::musiciansAll($where);
        $listList = Models_List::listAll();
        $path ='musicians.php';
        break;
}

include VIEWS_PATH . '/front/'.$path;
require_once VIEWS_PATH . '/front/footer.php';