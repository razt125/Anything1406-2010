<?php

class Lib_MsgError
{
    public static function setMsg ($message, $url = '')
    {
        if (empty($url))
        {
            $url = 'index.php';
        }
        include (VIEWS_PATH . 'error.html');
        include VIEWS_PATH . '/front/footer.php';
        exit();
    }

    public static function setUrl ($url)
    {
        header("Location:$url");
    }
}