<?php

namespace App;

use App\Singleton;

class Logger
    extends Singleton
{
    protected const PATH = __DIR__ . '/logs/log-';

    protected $logStream;

    public function __construct()
    {
        $fullPath = self::PATH . date('d-m-Y') . '.txt';
        $this->logStream = fopen($fullPath, 'a+');
    }

    public function __destruct()
    {
        fclose($this->logStream);
        static::$instance = null;
    }

    public function logError(\Exception $e)
    {
        if (get_class($e) != 'App\MultiException') {
            $record = $e->getMessage() . ' ' . date('d-m-Y H:i:s e') . "\n";
            fwrite($this->logStream, $record);
        }
    }
}