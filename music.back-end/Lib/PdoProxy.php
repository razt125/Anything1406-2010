<?php

// 建议：使用PDO，可把magic_quotes_gpc设置关闭，使用PDO本身过滤字符串的功能。
if (get_magic_quotes_gpc()) {
    ini_set(magic_quotes_gpc, off);
}

class Lib_PdoProxy
{

    private static $mLink = null;
    // private $mConf = array();
    private $mPdo = null;

    private $result = null;

    private $mType = '';

    private $mHost = '';

    private $mUser = '';

    private $mPasswd = '';

    private $mPort = '';

    private $mChar = '';

    private $mDb = '';

    private $mConn = false;

    protected $log = null;

    public static function getIns ()
    {
        if (self::$mLink == null) {
            self::$mLink = new self();
        }
        
        $config = new Config_Pdo();
        self::$mLink->log = Lib_Log::getIns();
        self::$mLink->db = $config->db;
        self::$mLink->connect();
        return self::$mLink;
    }

    private function __construct ()
    {}

    private function __clone ()
    {}

    /*
     * PHP5.3.6开始不能把字符集写在DSN中，要写在options中，
     * 如$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => ‘SET NAMES utf8′)。
     */
    private function connect ()
    {
        try {
            $this->mPdo = @new PDO($this->db);
            $this->mPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $Err) {
            
            $this->log->sqlLog('databases err', $Err->getMessage(), $Err->getLine(), 
                    $Err->getFile());
            Lib_MsgError::setMsg('database err', '/');
        }
    }
    
    // 过滤后的字符串 = $obj ->quote(字符串);
    protected function prepare ($sql)
    {
        
        // 记录sql语句
        $this->log->otherLog('sql:    ' . $sql);
        try {
            $this->result = $this->mPdo->prepare($sql);
        } catch (PDOException $Err) {
            $this->log->sqlLog('Mysql错误', $Err->getMessage(), $Err->getLine(), 
                    $Err->getFile(), $sql);
            exit();
        }
    }

    public function lastid ()
    {
        $this->result->lastInsertId();
    }

    private function execute ()
    {
        if ($this->result != null) {
            $this->result->execute();
        } else {
            return null;
        }
    }

    public function fetchType ($type)
    {
        switch ($type) {
            case 'column':
                return $this->result->fetchColumn();
                break;
            case 'one':
                return $this->result->fetch(PDO::FETCH_COLUMN);
                break;
            case 'all':
                return $this->result->fetchAll();
                break;
            default:
                throw new Exception('未知返回数据类型错误');
                return false;
                break;
        }
    }

    public function fetchMode ($type)
    {
        switch ($type) {
            case 'assoc':
                 $this->result->setFetchMode(PDO::FETCH_ASSOC);
                break;
            case 'num':
                 $this->result->setFetchMode(PDO::FETCH_NUM);
                break;
            case 'both':
                 $this->result->setFetchMode(PDO::FETCH_BOTH);
                break;
            default:
                throw new Exception('未知返回数据类型错误.'.$type);
                return false;
                break;
        }
        return $this;
    }

    /*
     * select * from tab;
     * select a from tab where b=b;
     */
    public function autoExecute ($tab, $arr, $act = 'insert', $where = '')
    {
        
        // insert into tab(a,b,c) values(1,2,3);
        switch ($act) {
            case 'insert':
                $key = '';
                $val = '';
                foreach ($arr as $k => $v) {
                    $key .= $k . ',';
                    $val .= '\'' . $v . '\',';
                }
                $key = trim($key, ',');
                $val = trim($val, ',');
                $sql = 'insert into ' . $tab . ' (' . $key . ') values (' . $val .
                         ')';
                break;
            
            // delete from tablenaeme where 条件;
            case 'delete':
                if (empty($where)) {
                    throw new Exception('Delete 数据库where错误');
                    return false;
                }
                $sql = 'delete from ' . $tab . ' where ' . $where;
                break;
            
            // update tab set a=b,b=c where a=b;
            case 'update':
                if (empty($where)) {
                    throw new Exception('Update 数据库where错误');
                    return false;
                }
                $kv = '';
                if (is_array($arr)) {
                    foreach ($arr as $k => $v) {
                        $kv .= $k . '="' . $v . '",';
                    }
                    $kv = trim($kv, ',');
                    $sql = 'update ' . $tab . ' set ' . $kv . ' where ' . $where;
                } else {
                    $sql = 'update ' . $tab . ' set ' . $arr . ' where ' . $where;
                }
                break;
            
            case 'select':
                $key = '';
                $wheres = '';
                if (!empty($where) && is_array($where)) {
                    foreach ($where as $k => $v) {
                        $wheres .= $k . '="' . $v . '" and ';
                    }
                    
                    $wheres = substr($wheres, 0, -4);
                }
                if ( is_array($arr) || !empty($arr) )
                {
                     $key = implode(',', $arr);
                }
                else 
                {
                    $key = '*';
                }
                
                if (! empty($wheres)) {
                    $sql = 'select ' . $key . ' from ' . $tab . ' where ' .
                             $wheres;
                } else {
                    $sql = 'select ' . $key . ' from ' . $tab;
                }
                break;
            
            default:
                throw new Exception('未知自动执行语句');
                return false;
                break;
        }
        
        try {
            $result = $this->prepare($sql);
            $this->execute();
        } catch (Exception $e) {
            $this->log->sqlLog('sql错误信息', $e->getMessage(), $e->getLine(), 
                    $e->getFile(), $sql);
            return false;
        }
        return $result;
    }

    public function getInfo ($data, $type = 'assoc', $fetchtype = 'fetchall', $tab = null)
    {
        $key = '';
        $val = '';
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $key .= $k . ',';
                $val = $v;
                $where .= $k . '=\'' . $v . '\' and ';
            }
            $key = trim($key, ',');
            $where = substr($where, 0, - 4);
            $sql = "select $key from $tab where $where ";
        } else {
            $sql = $data;
        }
        
        try {
            $this->prepare($sql);
            $this->execute();
            $this->fetchMode($type);
            $result = $this->result->$fetchtype();
        } catch (PDOException $e) {
            $this->log->sqlLog('sql错误信息', $e->getMessage(), $e->getLine(), 
                    $e->getFile(), $sql);
            return false;
        }
        return $result;
    }
    
    public function select ( $sql,$type='assoc',$fetchtype = 'fetchall' )
    {
        if( empty($type) )
        {
            $type='assoc';
        }
            
        try {
        	$this->prepare($sql);
        	$this->execute();
        	//$this->fetchMode($type);
        	$result = $this->result->$fetchtype();
        } catch (PDOException $e) {
        	$this->log->sqlLog('sql错误信息', $e->getMessage(), $e->getLine(),
        			$e->getFile(), $sql);
        	return false;
        }
        return $result;
    }
}


