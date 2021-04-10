<?php

namespace chumakov;

use core\LogAbstract;
use core\LogInterface;

class MyLog extends LogAbstract implements LogInterface
{
    public static function log(string $str) :void
    {
        MyLog::Instance()->log[] =$str;
    }
    public static function write():void
    {
        MyLog::Instance()->_write();
    }
    public function _write()
    {
        $dateLog = date('d.m.Y_H.i.s.v');
        foreach ($this->log as $v)
        {
            echo $v . "\r\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "log\\$dateLog.log", $v . PHP_EOL, FILE_APPEND);
        }
    }

    public static function clearArray()
    {
        MyLog::Instance()->log = array();
    }

    public static function getLog()
    {
        return MyLog::Instance()->log;
    }
}
