<?php
require 'Inc/init.class.php';
$list = Models_Bulletin::bulletinList();

require_once VIEWS_PATH . '/front/index.php';

require_once VIEWS_PATH . '/front/footer.php';
