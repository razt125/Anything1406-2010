<?php

class Config_Pdo
{
    
    /**
     * dbconfig
     * @var unknown
     */
    private $dbConfig = array(
        'type' => 'sqlite:',
        'db' => 'sqlite:./sqlite/user.sqlite',
         
    );
    
    public function __get( $key )
    {
        if ( isset($this->dbConfig[$key]) ) 
        {
            return $this->dbConfig[$key];
        }
        else 
        {
            return null;
        }
    }

}
