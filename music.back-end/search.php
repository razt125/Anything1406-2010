<?php
require 'Inc/init.class.php';
if ( !empty($_GET['word']) )
{
    $result = Models_Musicians::search($_GET['word']);
}

require_once (VIEWS_PATH . '/front/search.php');
require_once VIEWS_PATH . '/front/footer.php';