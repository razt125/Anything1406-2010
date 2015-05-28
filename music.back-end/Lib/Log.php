<?php


class Lib_Log
{

    protected static $lLink = null;
 // 静态属性,单例用
    private $time = 0;
 // 日志时间用
    private $msg = '';
 // 需要写入的文本
    protected $file_dir = '';
 // 日志路径
    private $config = null;

    public $logfile = '';
 // 日志文件名
    private $filetime = 0;

    public static function getIns ()
    {
        if ( self::$lLink == null ) 
        {
            self::$lLink = new self();
        }
        
        self::$lLink->logTime();
        self::$lLink->filetime = date('Y-m-d'); // 创建日志文件的日期
        self::$lLink->file_dir = LOG_PATH;
        return self::$lLink;
    }

    protected function __construct ()
    {
        $this->logfile = 'music.log';
    }

    private function logTime ()
    {
        $this->msg = '';
        $this->time = date('[Y-m-d H:i:s]'); // 日志文件的时间
        $this->msg = $this->time . str_repeat("\t", 1) . "\r\n";
    }

    public function sqlLog ($msg, $detail, $line, $info, $sql = '', $type = 'Error'){ 
        $this->msg .= $msg . ':  "' . $detail . "\",\r\n" . $type . '行号:   "' .
                 $line . "\",\r\n" . $type . '语句:   "' . $sql . "\",\r\n" . $type .
                 '文件:   "' . $info . "\",\r\n\r\n"; // 写入文件的信息
        $this->logfile = $this->file_dir . $this->filetime . '-' . ucwords(
                $type) . '.log';
        $this->writeLog(); // 打开文件写入日志
    }

    public function otherLog ($msg, $type = 'Warning')
    {
        $this->msg .= $msg . "\r\n";
        $this->logfile = $this->file_dir . $this->filetime . '-' . ucwords(
                $type) . '.log';
        $this->writeLog();
    }

    protected function writeLog ()
    {
        if (! is_dir($this->file_dir)) {
            mkdir($this->logfile, 0755, true);
        }
        $file = fopen($this->logfile, "a");

        fwrite($file, $this->msg);
        $this->logTime();
        fclose($file);
    }
}