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
        $list = Models_Bulletin::bulletinList($where);

        $path = 'bulletin_list.php';
        break;
    case 'add':

        if (!empty($_REQUEST))
        {
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img'] )) {
                $target_file = UPLOAD_PATH;
                $file = 'bulletin'.date('YmdHis');
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
            foreach (array('title','content','long_time','img') as $v)
            {
                if ( empty($_REQUEST[$v]) )
                {
                    Lib_MsgError::setMsg($v.' not empty');
                }
            }
            unset($_REQUEST['add']);
            $_REQUEST['uid'] = $_SESSION['id'];
            $_REQUEST['uname'] = $_SESSION['username'];
            $_REQUEST['long_time'] = time() + (86400 * intval($_REQUEST['long_time']));
            Models_Bulletin::addBulletin($_REQUEST);
            Lib_MsgError::setMsg('add ok', 'center.php');
        }

        $path = 'bulletin_add.php';
        break;
    case 'content':
         
        $info = Models_Bulletin::getBulletin($_REQUEST['id']);   

        $path = 'bulletin_content.php';

        break;
    case 'info':
	    $info = Models_Bulletin::getBulletin($_REQUEST['id']);
	    $path = 'bulletin_info.php';
        break;
    case 'edit':
        $id = $_REQUEST['id'];
        unset($_REQUEST['id']);
        if ( !empty($_REQUEST) )
        {
            if (isset ( $_FILES ["img"] ) && ! empty ( $_FILES ['img']['name'] )) {
                $target_file = UPLOAD_PATH;
                       $file = 'bulletin'.date('YmdHis');
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
            Models_Bulletin::doBulletin($id, $_REQUEST);
            Lib_MsgError::setMsg('mod ok', 'center.php');
        }
        break;
    default:
        $list = Models_Bulletin::bulletinList();

        $path = 'bulletin.php';
        break;
}

include VIEWS_PATH . '/front/'.$path;

require_once VIEWS_PATH . '/front/footer.php';